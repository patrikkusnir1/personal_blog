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
		<form action="create-post.php" method="POST" class="section article-single">
				<input type="hidden" name="csrf_token" 
	       			   value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>"
				>
				<div class="input-wrapper" style="margin-bottom: 15px">
					<label for="image">Cover Image Path</label>
					<input type="text" id="image" name="image" class="input-field"       value="../assets/images/recent-post-1.jpg">		
				</div>

				<div class="card-wrapper" style="margin-bottom: 15px;">
					<!-- choose badge -->
					<div class="input-wrapper">
						<input type="text" id="badge" name="badge" class="input-field" placeholder="e.g Working Tips">
					</div>


					<div class="card-tag" style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 10px">
					
						<?php foreach ($tags as $tag): ?>
							<input type="checkbox" 
							       value="<?= (int)$tag['id'] ?>"
							       name="<?= (int)$tag['name'] ?>">

						<?php endforeach ?>
					</form>
					
				</div>
			
			</div>


		</form>




			<h1 class="headline headline-2 card-title">
                 <!-- add article title -->
                 <input type="text" required>
			</h1>
			<!-- Author and published meta info -->
			<div class="card-wrapper" style="margin-block: 20px 30px">
				<div class="profile-card">
					<!-- add image -->
                    
					<div>
						<!-- add author name -->
						<p class="card-title">
							<input type="text" value="Patrik">
						</p>
						<time class="card-date"
						      datetime="<?= htmlspecialchars(date("d F Y, H:i")) ?>">
						</time>
					</div>
				</div>
			</div>
			<!-- full article body -->
			<div class="article-text">
			    <textarea rows="10" required></textarea>
			</div>

		</section>
	</div>


</main>

<?php include_once __DIR__ . '/includes/footer.php' ?>



