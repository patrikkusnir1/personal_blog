<?php 
	declare(strict_types=1);
	session_start();

	ini_set( 'display_errors','1' );
	error_reporting(E_ALL);

	require_once __DIR__ . '/includes/functions.php';
	require_once __DIR__ . '/includes/db.php';

	// 1. Check admin rights first
	if ( ! can_edit() ) 
	{
		header('Location: index.php');
		exit;
	}

	// 2. generate csrf token 32 characters
	if ( empty($_SESSION['csrf_token']) ) {
		$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
	}

	$errors = [];

	// 3. only verify CSRF and process inputs on POST submission
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		if ( 
			!isset( $_POST['csrf_token'], $_SESSION['csrf_token'] ) ||
	   		!hash_equals( $_SESSION['csrf_token'], $_POST['csrf_token'] )    
	    ) {
			http_response_code(403);
			exit;	
		}

		// NEXT STEP: validate fields and INSERT into articles + article_tag here
	}



	// 4. fetch tags for the form checkboxes
	$stmt = $pdo->query('
			SELECT id, name 
			FROM tags
			ORDER BY name ASC
		');
	$tags = $stmt->fetchAll();
	
	include_once 'includes/header.php'; 
?>

<main>
	<div class="container">
		<section class="section article-single">
			<h1 class="headline headline-2 section-title">
				<span class="span">Create new post</span>
			</h1>

			<form action="create-post.php" method="POST" class="post-form card">
					<input type="hidden" name="csrf_token" 
		       			   value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>"
					>

					<div class="form-group">
						<label for="title" class="form-label">Article title</label>
						<input type="text" id="title" name="title" class="input-field"       placeholder="Enter title...">		
					</div>

					<div class="form-row">
						<div class="form-group">
							<label for="badge" class="form-label">Badge</label>
							<input type="text" id="badge" name="badge" class="input-field" placeholder="e.g Working Tips">
						</div>

						<div class="form-group">
							<label for="author" class="form-label">Author</label>
							<input type="text" id="author" name="author" class="input-field" value="Patrik">
						</div>
					</div>

					<div class="form-group">
						<label for="image" class="form-label">Cover Image path</label>
						<input type="text" id="image" name="image" class="input-field" value="./assets/images/recent-post-1.jpg">
					</div>

					<div class="form-group">
						<span class="form-label">Topics / Tags</span>
						<div class="tag-selector">
							<?php foreach ($tags as $tag): ?>
							<label class="tag-checkbox" >
								<input type="checkbox" 
								       value="<?= (int)$tag['id'] ?>"
								       name="tags[]">
								<span> <?= htmlspecialchars($tag['name']) ?> </span>
							</label>
							<?php endforeach; ?>	
						</div>
					</div>


					<!-- Author and published meta info -->
					<div class="card-wrapper" style="margin-block: 20px 30px;">
						<div class="profile-card">
							<div>
								<label for="author">Author</label>
								<input type="text" id="author" name="author" class="input-field" value="Patrik">
								<time class="card-date"
							      datetime="<?= htmlspecialchars(date("Y-m-d\TH:i")) ?>">
							      <?= htmlspecialchars(date('d F Y, H:i')) ?>
								</time>
							</div>
						</div>
					</div>
					<!-- full article body -->
					<div class="article-text" style="margin-bottom: 20px">
						<label for="full_text">Content</label>
				    	<textarea id="full_text" name="full_text" class="input-field" rows="10" placeholder="Write your article..."  required></textarea>
					</div>

					<button type="submit" class="btn btn-primary">
						<span class="span">Publish Article</span>
					</button>
			</form>
		</section>
	</div>
</main>

<?php include_once __DIR__ . '/includes/footer.php' ?>



