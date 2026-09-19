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
        <div class="post-aside grid-list">
            <div class="card aside-card">
                <h3 class="headline headline-2 aside-title">
                    <span class="span">Popular posts</span>
                </h3>
                <ul class="popular-list">
                    <?php 
                        $popular_articles = $collection->get_popular_posts();
                        foreach ($popular_articles as $article):?>
                            <li>
                                <div class="popular-card">
                                    <figure class="card-banner img-holder" 
                                        style="--width:64 ; --height:64 ;"
                                        loading="lazy">
                                        <img src="./assets/images/popular-post-1.jpg" width="64" 
                                                height="64" alt="" class="img-cover">
                                    </figure>
                                    <div class="card-content">
                                        <h4 class="headline headline-4 card-title">
                                            <a href="#" class="link hover-2"><?= htmlspecialchars($article->title) ?></a>
                                        </h4>
                                        <div class="wrapper">
                                            <p class="card-subtitle">
                                        <?= $article->getReadTime()?>
                                            </p>
                                            <time 
                                                class="publish-date" datetime="
                                                <?= $article->date ?>"
                                            >
                                            <?= $article->date ?>
                                            </time>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach ?>
                </ul>
            </div>
            <div class="card aside-card">
                <h3 class="headline headline-2 aside-title">
                    <span class="span">Last Comment</span>
                </h3>
                <ul class="comment-list">
                    <li>
                        <div class="comment-card">
                            <blockquote class="card-text">
                                “ Gosh jaguar ostrich quail one excited dear hello and bound and the and
                                bland moral misheard roadrunner “
                            </blockquote>
                            <div class="profile-card">
                                <figure class="profile-banner img-holder">
                                    <img src="./assets/images/author-6.png" width="32" height="32"
                                        loading="lazy" alt="Jane Cooper" class="img-cover">
                                </figure>
                                <div>
                                    <p class="card-title">Jane Cooper</p>
                                    <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="comment-card">
                            <blockquote class="card-text">
                                “ Gosh jaguar ostrich quail one excited dear hello and bound and the and
                                bland moral misheard roadrunner “
                            </blockquote>
                            <div class="profile-card">
                                <figure class="profile-banner img-holder">
                                    <img src="./assets/images/author-7.png" width="32" height="32"
                                        loading="lazy" alt="Katen Doe" class="img-cover">
                                </figure>
                                <div>
                                    <p class="card-title">Katen Doe</p>
                                    <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="comment-card">
                            <blockquote class="card-text">
                                “ Gosh jaguar ostrich quail one excited dear hello and bound and the and
                                bland moral misheard roadrunner “
                            </blockquote>
                            <div class="profile-card">
                                <figure class="profile-banner img-holder">
                                    <img src="./assets/images/author-8.png" width="32" height="32"
                                        loading="lazy" alt="Barbara Cartland" class="img-cover">
                                </figure>
                                <div>
                                    <p class="card-title">Barbara Cartland</p>
                                    <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card aside-card insta-card">
                <a href="#" class="logo">
                    <img src="./assets/images/patrik-high-resolution-logo-transparent.png" width="119"
                        height="37" loading="lazy" alt="Train travel logo">
                </a>
                <p class="card-text">
                    Follow us on instagram
                </p>
                <ul class="insta-list">
                    <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                            <img src="./assets/images/insta-post-1.png" width="276" height="277"
                                loading="lazy" alt="insta post" class="img-cover">
                        </a>
                    </li>
                    <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                            <img src="./assets/images/insta-post-2.png" width="276" height="277"
                                loading="lazy" alt="insta post" class="img-cover">
                        </a>
                    </li>
                    <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                            <img src="./assets/images/insta-post-3.png" width="276" height="277"
                                loading="lazy" alt="insta post" class="img-cover">
                        </a>
                    </li>
                    <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                            <img src="./assets/images/insta-post-4.png" width="276" height="277"
                                loading="lazy" alt="insta post" class="img-cover">
                        </a>
                    </li>
                    <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                            <img src="./assets/images/insta-post-5.png" width="276" height="277"
                                loading="lazy" alt="insta post" class="img-cover">
                        </a>
                    </li>
                    <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                            <img src="./assets/images/insta-post-6.png" width="276" height="277"
                                loading="lazy" alt="insta post" class="img-cover">
                        </a>
                    </li>
                    <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                            <img src="./assets/images/insta-post-6.png" width="276" height="277"
                                loading="lazy" alt="insta post" class="img-cover">
                        </a>
                    </li>
                    <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                            <img src="./assets/images/insta-post-7.png" width="276" height="277"
                                loading="lazy" alt="insta post" class="img-cover">
                        </a>
                    </li>
                    <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                            <img src="./assets/images/insta-post-8.png" width="276" height="277"
                                loading="lazy" alt="insta post" class="img-cover">
                        </a>
                    </li>
                    <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                            <img src="./assets/images/insta-post-9.png" width="276" height="277"
                                loading="lazy" alt="insta post" class="img-cover">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>