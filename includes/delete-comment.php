<?php 
header("Content-Type: application/json; charset=utf8");
session_start();

ini_set('display_errors', '1');
error_reporting(E_ALL);

// verify the request uses post method
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
	http_response_code(405);
	echo json_encode([
		"status"  => "error",
		"message" => "Method not allowed"
	]);
	exit();
}

// include database connection
require __DIR__ . "/db.php";

// verify the CSRF token
if (
	!isset($_POST['csrf_token'], $_SESSION['csrf_token']) || 
	!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
) {
	http_response_code(403);
	echo json_encode([
		"status" => "error",
		"message" => "Invalid csrf token"
	]);
	exit();
}

// validate comment_id and article_id
$comment_id = filter_var($_POST['comment_id'] ?? null, FILTER_VALIDATE_INT, [
	"options" => ["min_range" => 1]
]);

$article_id = filter_var($_POST['article_id'] ?? null, FILTER_VALIDATE_INT, [
	"options" => ["min_range" => 1]
]);

if ($comment_id === false || $article_id === false) {
	http_response_code(400);
	echo json_encode([
		"status"  => "error",
		"message" => "Invalid comment or article ID."
	]);
	exit();
}

// check whether the comment belongs to the current session
$editable_comments = $_SESSION['editable_comments'] ?? [];

// ensure $editable_comments is array
if (!is_array($editable_comments)) {
	$editable_comments = [];
}

$editable_comments = array_map("intval", $editable_comments); 

if (!in_array($comment_id, $editable_comments, true)) {
	http_response_code(403);
	echo json_encode([
		"status"  => "error",
		"message" => "You are not allowed to delete this comment"
	]);
	exit();
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
			"status"  => "error",
			"message" => "Comment not found"
		]);
		exit();
	}

	// DELETE comment
	$stmt = $pdo->prepare("
		DELETE FROM comments
		WHERE comment_id = :comment_id
		  AND article_id = :article_id
	");

	// Execute DELETE
	$stmt->execute([
		":comment_id"   => $comment_id,
		":article_id"   => $article_id,
	]);

	// check whether deletion succeeded
	if ($stmt->rowCount() !== 1) {
		http_response_code(400);
		echo json_encode([
			"status"  => "error",
			"message" => "Comment could not be deleted."
		]);
		exit();
	}

	// remove deleted ID from session
	$_SESSION['editable_comments'] = array_values(
		array_filter(
			$editable_comments,
			function($id) use ($comment_id) {
				return (int)$id !== $comment_id;
			}
		) 
	);
	
	echo json_encode(["status" => "success", "comment_id" => $comment_id]);
	exit();

} catch (Throwable $e) {
	error_log("delete-comment failed: " . $e->getMessage());
	http_response_code(500);
	echo json_encode([
		"status"  => "error",
		"message" => "Could not delete a comment"
	]);
	exit();
}



