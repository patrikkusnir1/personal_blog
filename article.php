<?php 
require "includes/db.php";

// get article id via $_GET
$article_id = $_GET["id"] ?? null;

// validate id
$options = [
			"options" => [
				"min_range" => 1
			]
		];

$article_id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT, $options);

$article = false;

// missing or invalid current_id - redirect it
if ($article_id) {
	$stmt = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
	$stmt->execute([":id" => $article_id]);
	$article = $stmt->fetch();
}

// id is not valid number or wasn't found in the database
if (!$article) {
	// wait 3 seconds, then navigate to index.php
	header( "Refresh: 3; url=index.php" );
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Article not found</title>
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body style="display: flex; justify-content: center; align-items: center; min-height: 100vh; text-align: center;">
		<div class="card" style="padding: 40px; border-radius: var(--radius-16);">
			<h2 class="headline headline-2" style="margin-bottom: 10px;">
				Article not found
			</h2>
			<p style="color: var(--text-wild-blue-yonder);">
				Redirecting you to the homepage in 3 seconds...
			</p>
		</div>
	</body>
</html>
<?php
	exit; 
}?>

<?php include "includes/header.php"; ?>
<main>
	<section class="section article-single">
		<figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
			<img src="" alt="">
		</figure>
	</section>
</main>
<?php include "includes/footer.php"; ?>


