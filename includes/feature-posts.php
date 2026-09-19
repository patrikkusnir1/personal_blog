<!-- 
    #FEATURED POSTS
-->
<section class="section feature" aria-label="feature" id="featured">
    <div class="container">
        <h2 class="headline headline-2 section-title">
            <span class="span">Editor's picked</span>
        </h2>
        <p class="section-text">
            Featured and highly rated articles
        </p>
        <ul class="feature-list">
            <?php
            // show only 2 articles here
            
            $articles_to_show = (int) ($_GET["show"] ?? "2");
            
            $feature_posts = array_slice( $collection->getArticles(), 0, $articles_to_show );


            foreach ($feature_posts as $article): 
                $date = new DateTime($article->date);
            ?>
            
            <li>
                <div class="card feature-card">
                    <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                        <img src="./assets/images/featured-1.png"
                            alt="<?= htmlspecialchars($article->title)?>" 
                            class="img-cover"
                            width="1602" loading="lazy" height="903">
                    </figure>

                    <div class="card-content">
                        <div class="card-wrapper">
                            <div class="card-tag">
                                <?= $article->renderTagLinks() ?>
                            </div>
                            <div class="wrapper">
                                <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                <span class="span"><?= $article->getReadTime() ?></span>
                            </div>
                        </div>
                        <h3 class="headline headline-3">
                            <a href="#" class="card-title hover-2">
                                <?php echo htmlspecialchars($article->title); ?>
                            </a>
                        </h3>
                        <div class="card-wrapper">
                            <div class="profile-card">
                                <img src="./assets/images/author-1.png" width="48" height="48"
                                    loading="lazy" alt="Joseph" class="profile-banner">
                                <div>
                                    <p class="card-title"><?= 
                                    htmlspecialchars($article->author) ?> 
                                    </p>
                                    <p class="card-subtitle"><?= htmlspecialchars($date->format("d F Y"))?>
                                    </p>
                                </div>
                            </div>
                            <a href="#" class="card-btn">Read more</a>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach ?>
        </ul>
        <?php

        // show max articles, don't exceed $articles_total_count
        $articles_current_count = $_GET["show"] ?? "2"; 
        $articles_to_show = min($articles_to_show + 2, $articles_total_count);
        
        ?>
        
        <?php 

        // TODO: refactor the link

        if ($articles_current_count < $articles_total_count):?>
            <a href="<?php echo "./?show={$articles_to_show}#featured" ?>" class="btn btn-secondary">
            
                <span class="span">Show more posts</span>
                <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
            </a>
            <?php endif; ?>
    </div>
    <img src="./assets/images/shadow-3.svg" width="500" height="1600" loading="lazy" alt=""
        class="feature-bg">
</section>