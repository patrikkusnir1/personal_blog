<!-- 
    #RECENT POST
-->
<section class="section recent-post" id="recent" aria-labelledby="recent-label">
    <div class="container">
        <div class="post-main">
            <h2 class="headline headline-2 section-title">
                <span class="span">
                    Recent posts
                </span>
            </h2>
            <p class="section-text">
                Don't miss the latest trends. We have currently <?= count($collection->getArticles()) ?> recent posts on our website across <?= count($collection->get_tags()) ?> topics.
            </p>
            <ul class="grid-list">
                <?php
                $current_category = $_GET["category"] ?? "";

                // get category and filter posts by category
                $filtered_posts = array_filter($collection->getArticles(),function($article) {
                    return $article->post_has_category();
                });

                // count filtered posts
                $articles_total_count = count($filtered_posts);

                // calculate pagination count
                $pagination_count = ceil( 
                    $articles_total_count / $articles_per_page );

                // validate page
                $options = array('options' => array(
                    "min_range" => 1, 
                    "max_range" => $pagination_count,
                    )
                );
                $current_page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT, $options) ?: 1;

                // slice posts
                
                $paginated_posts = array_slice( $filtered_posts, ( ($current_page - 1) * $articles_per_page), $articles_per_page  );
                
                // show posts
                foreach ($paginated_posts as $article):             
                ?>
                
                <li class="recent-post-card">
                    <figure class="card-banner img-holder" style="--width: 271; --height: 258 ;">
                    
                        <img src="<?= $article->image ?>" 
                            alt="<?= htmlspecialchars($article->title) ?>" 
                            width="271" 
                            height="258" 
                            class="img-cover" 
                            loading="lazy">
                    </figure>
                    <div class="card-content">
                        <a href="" class="card-badge">
                            <?= $article->badge ?>
                        </a>

                        <h3 class="headline headline-3 card-title">
                            <a href="#" class="link hover-2">
                                <?= htmlspecialchars($article->title) ?></a>
                        </h3>
                        <p class="card-text">
                            <?= htmlspecialchars($article->getExcerpt()) ?>
                        </p>

                        <div class="card-wrapper">
                            <div class="card-tag">
                                <?= $article->renderTagLinks() ?>
                            </div>

                            <div class="wrapper">
                                <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                <span class="span">
                                <?= htmlspecialchars
                                ($article->getReadTime()) ?></span>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach ?>
            </ul>
            <nav aria-label="pagination" class="pagination">
                <?php
                




                //  create pagination backward arrow

                    if ( $current_page > 1)
                    {
                        render_arrow_link(
                            $current_category, 
                            $current_page - 1, 
                            "previous page", 
                            "arrow-back"
                        ); 
                    };
                
                // create pagination buttons based on articles count
                $pagination = 1;

                while ( $pagination < $pagination_count + 1 ) {


                    if ( $pagination == $current_page ) 
                        {
                        render_number_link($current_category, $pagination, true);
                        }
                    else 
                    {
                        render_number_link($current_category, $pagination);
                    }
                    $pagination++;
                } 
                    
                //  create pagination forward arrow -->

                    if ( $current_page <= $pagination_count - 1) 
                    {
                        render_arrow_link(
                            $current_category, 
                            $current_page + 1, 
                            "next page", 
                            "arrow-forward"
                        ); 
                    }

                    if ( $pagination_count > 5) 
                    {
                        echo '<a href="#" class="pagination-btn" aria-label="more page">
                            ...
                            </a>';
                    }
                ?>
            </nav>
        </div>
        <?php require 'includes/sidebar.php' ?>
    </div>
</section>