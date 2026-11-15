<?php 
function pick_image(array $images, int $index): string
{
	$image_index = $index % count($images);
	$image_path = $images[$image_index];

	return $image_path;
}

function render_arrow_link($category, $page, $ariaLabel, $iconName) 
{

    $array = http_build_query(  
        [
        	"category" => $category,
         	"page" => $page,
        ]
    ); 
    
    echo '
    <a href="?'.$array.'#recent" class="pagination-btn" aria-label="'.$ariaLabel.'">
    	<ion-icon name="'.$iconName.'" aria-hidden="true"></ion-icon>
	</a>';
}

function render_number_link($category, $page, $isActive = false)
{


        $array = http_build_query(  
            [
                "category" => $category,
                "page" => $page,
            ]
        ); 


        if ( $isActive ) 
        {
            echo "<a href='?$array#recent' class='pagination-btn active'>$page</a>";
        } 
        else 
        {
            echo "<a href='?$array#recent' class='pagination-btn'>$page</a>";
        }
}

function show_topics($collection, $topics) {
    
    // define placeholder images - repeating list
    $placeholder_images = [
        "./assets/images/topic-1.png",
        "./assets/images/topic-2.png",
        "./assets/images/topic-3.png",
        "./assets/images/topic-4.png",
        "./assets/images/topic-5.png",
    ];

    foreach ($topics as $index => $tag):
        $tag_count = $collection->post_has_tags($tag);
        $image_path = pick_image($placeholder_images, $index);
        $safe_tag = htmlspecialchars($tag, ENT_QUOTES, 'UTF-8');
        $category_url = Article::build_category_url($tag);
?>
        <li class="slider-item">
            <a href="?<?= $category_url ?>#recent" class='slider-card'>
                <figure class="slider-banner img-holder" style="--width: ; --height: ;">
                    <img src="<?= $image_path ?>" width="507" height="608"
                        loading="lazy" alt="<?= $safe_tag ?>" class="img-cover">
                </figure>
                <div class="slider-content">
                    <span class="slider-title"><?= $safe_tag ?></span>
                    <p class="slider-subtitle">
                        <?= $tag_count ?><? $tag_count === 1 ? 'article' : 'articles' ?>
                    </p>
                </div>
            </a>
        </li>
       <?php 
            endforeach;
    }

function show_categories( $topics ) {
    $articles_to_show = 2;

    // define placeholder images - repeating list
    $placeholder_images = [
        "./assets/images/tag1.png",
        "./assets/images/tag2.png",
        "./assets/images/tag3.png",
        "./assets/images/tag4.png",
        "./assets/images/tag5.png",
        "./assets/images/tag6.png",
        "./assets/images/tag7.png",
        "./assets/images/tag8.png",
        "./assets/images/tag9.png",
        "./assets/images/tag10.png",
        "./assets/images/tag11.png",
        "./assets/images/tag12.png",

    ];
    foreach ($topics as $index => $tag) {
        // get the image based on index - repeating every 5
        $image_path = pick_image($placeholder_images, $index);
        $safe_tag = htmlspecialchars($tag, ENT_QUOTES, 'UTF-8');

        $a_url = http_build_query([ 
           "category" => $tag, // raw tag for URL encoding
           "show"     => $articles_to_show,
        ]);

        echo "
        <li>
            <a class='card tag-btn' href='?$a_url#recent'>
                <img src='$image_path' width='32' height='32' loading='lazy' alt='$safe_tag'>
                <p class='btn-text'>$safe_tag</p>
            </a>
        </li>";
    }
}


?>