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
	<div class="container">
		<section class="section article-single">
			<figure class="card-banner img-holder article-hero" style="--width: 1602; --height: 903;">
				<img src="<?= htmlspecialchars($article['image']) ?>" width="1602" height="903" alt="<?= htmlspecialchars($article['title']) ?>" class="img-cover">
			</figure>

	        <div class="card-wrapper">
		        <div class="card-tag">
		            <span class="card-badge"><?= htmlspecialchars($article['badge']) ?></span>
		        </div>

		        <div class="wrapper">
		            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
		            <span class="span">
		            	<?= ceil($article['word_count'] / 200 ) ?> mins read
		            </span>
		        </div>
	    	</div>

			<h1 class="headline headline-2 card-title">
	            <?= htmlspecialchars($article['title']) ?>
	        </h1>

	        <!-- Author and published meta info -->
	        <div class="card-wrapper"  style="margin-block: 20px 30px;">
	        	<div class="profile-card">
	        		<img src="./assets/images/author-1.png" width="40" height="40" alt="Elena" class="profile-banner">
	        		<div>
	        			<p class="card-title">
	        				<?= htmlspecialchars($article["author"]) ?>
	        			</p>
	        			<time class="card-date" datetime="<?= htmlspecialchars($article['published_at']) ?>">
	        				<?= date("d F Y", strtotime($article["published_at"])) ?>
	        			</time>
	        		</div>
	        	</div>
	        </div>
	        <!-- Full article body -->
	        <div class="article-text">
	        	<?= nl2br(htmlspecialchars($article["full_text"])) ?>
	        </div>
		</section>
	</div>
	<div class="comments-section" id="comments">
		<h2 class="headline headline-2 section-title">Comments</h2>

		<ul class="comment-list">
			<?php 
				$comment_stmt = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id ORDER BY created_at DESC");
				$comment_stmt->execute([':article_id' => $article_id]);
				$comments = $comment_stmt->fetchAll();

				if (empty($comments)): 					
			?>
				<li class="no-comments">
					<p class="card-text">No comments yet. Be the first to share your thoughts!</p>
				</li>
			<?php else: ?>
				<?php foreach($comments as $comment): ?>
					<li>
						<div class="card comment-card">
							<p class="card-text">
								<?= nl2br(htmlspecialchars($comment['comment_text'])) ?>
							</p>

							<div class="profile-card">
								<div>
									<p class="card-title">
										<?= htmlspecialchars($comment['author_name']) ?>
									</p>
									<time class="card-date" datetime="<?= htmlspecialchars($comment['created_at']) ?>">
								         <?= htmlspecialchars($comment['created_at']) ?>
									</time>
								</div>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>

</main>

<?php 
	// fetch categories for footer
	$tags_stmt = $pdo->query("SELECT name FROM tags ORDER BY name ASC");
	$tags_array = $tags_stmt->fetchAll(PDO::FETCH_COLUMN);


include "includes/footer.php"; ?>


