<?php
declare(strict_types=1);

ini_set('display_errors', '1');
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}


header("Content-Type: application/json; charset=utf-8");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
	http_response_code(405);
	echo json_encode(["status" => "error", "message" => "Method not allowed"]);
	exit;
}

require __DIR__ . "/db.php";


// ---- validate id -----
$article_id   = filter_var($_POST["article_id"] ?? null, FILTER_VALIDATE_INT, [
	'options' => ['min_range' => 1]
]);

if ($article_id === false || $article_id === null) {
	http_response_code(422);
	echo json_encode(["status" => "error", "message" => "Invalid article."]);
	exit;
}


// ---- validate text fields ----
$author_name  = trim((string)$_POST['author_name'] ?? "");
$comment_text = trim((string)$_POST['comment_text'] ?? "");

if ( $author_name === "" || $comment_text === "" ) {
	http_response_code(422);
	echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
	exit;
}

if (mb_strlen($author_name) > 100) {
	http_response_code(422);
	echo json_encode(['status' => 'error', 'message' => 'Name is too long (max 100).']);
	exit;
}

if (mb_strlen($comment_text) > 2000) {
	http_response_code(422);
	echo json_encode(['status' => 'error', 'message' => 'Comment is too long (max 2000).']);
	exit;
}

try {
	$check = $pdo->prepare("SELECT 1 FROM articles WHERE id = :id");
	$check->execute([':id' => $article_id]);

	if (!$check->fetchColumn()) {
		http_response_code(404);
		echo json_encode(["status" => "error", "message" => "Article not found"]);
		exit;
	}

	$stmt = $pdo->prepare("
		INSERT INTO comments (article_id, author_name, comment_text, created_at) 
		VALUES (:article_id, :author_name, :comment_text, NOW())
	");

	$stmt->execute([
		':article_id'   => $article_id, 
		':author_name'  => $author_name, 
		':comment_text' => $comment_text,
	]);

	$new_id = (int)$pdo->lastInsertId();

	// store comment ID so visitor can edit it later.
	if ( !isset($_SESSION['editable_comments'] ) || 
		 !is_array($_SESSION['editable_comments'])) {
		 $_SESSION['editable_comments'] = [];
	}

	$_SESSION['editable_comments'][] = $new_id;

	echo json_encode([
		'status' => 'success',
		'comment' => [
			'id'  		   => $new_id,
			'author_name'  => htmlspecialchars($author_name, ENT_QUOTES, 'UTF-8'),
			'comment_text' => nl2br(htmlspecialchars($comment_text, ENT_QUOTES, 'UTF-8')),
			'created_at'   => date("d F Y, H:i") 
		],
	]);
	exit;
} catch (Throwable $e) {
	error_log('add-comment failed: ' . $e->getMessage());
	http_response_code(500);
	echo json_encode(['status' => 'error', 'message' => 'Could not save comment.']);
} 
