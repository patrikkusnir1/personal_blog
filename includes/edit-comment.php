<?php 
session_start();

ini_set('display_errors', '1');
error_reporting(E_ALL);

header("Content-Type: application/json; charset=utf-8");

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
	http_response_code(405);
	echo json_encode([
		"status" => "error", 
		"message" => "Method not allowed",
	]);
	exit;
}

require __DIR__ . "/db.php";

// validate ids
$comment_id = filter_var($_POST['comment_id'] ?? null, FILTER_VALIDATE_INT, [
	"options" => ["min_range" => 1]
]);

$article_id = filter_var($_POST['article_id'] ?? null, FILTER_VALIDATE_INT, [
	"options" => ["min_range" => 1]
]);

$comment_text = trim((string)($_POST['comment_text'] ?? ""));

// validate input
if (
	$comment_id === false || $comment_id === null ||
	$article_id === false || $article_id === null ||
	$comment_text === "" ||
	mb_strlen($comment_text) > 2000
){
	http_response_code(422);
	echo json_encode([
		"status" => "error",
		"message" => "Comment must contain 1-2000 characters"
	]);
	exit;
}


// check whether this visitor owns the comment
$editable_comments = $_SESSION['editable_comments'] ?? [];

if (!is_array($editable_comments)) {
	$editable_comments = [];
}

$editable_comments = array_map("intval", $editable_comments); 

if (!in_array($comment_id, $editable_comments, true)) {
	http_response_code(403);
	echo json_encode([
		"status" => "error",
		"message" => "You are not allowed to edit this comment"
	]);
	exit;
}

try {
	// check whether the comment exists and belongs to this article
	$check = $pdo->prepare("
				SELECT 1
				FROM comments
				WHERE comment_id = :comment_id
				AND article_id = :article_id

		");

	$check->execute([
		":comment_id" => $comment_id,
		":article_id" => $article_id 
	]);

	if (!$check->fetchColumn()) {
		http_response_code(404);
		echo json_encode([
			"status" => "error",
			"message" => "Comment not found"

		]);
		exit;
	}

	// Update comment
	$stmt = $pdo->prepare("
		UPDATE comments
		SET comment_text = :comment_text
		WHERE comment_id = :comment_id
		  AND article_id = :article_id
	");

	$stmt->execute([
		":comment_id"   => $comment_id,
		":article_id"   => $article_id,
		":comment_text" => $comment_text
	]);

	echo json_encode([
		"status" => "success",
		"comment_text" => $comment_text
	]);
	exit;
} catch (Throwable $e) {
	error_log("edit-comment failed: " . $e->getMessage());

	http_response_code(500);
	echo json_encode([
		"status" => "error",
		"message" => "Could not update a comment"
	]);
}



