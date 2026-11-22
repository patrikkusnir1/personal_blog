<!-- 
    #SIDEBAR
-->

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
                            <figure 
                                class="card-banner img-holder" 
                                style="--width:64 ; --height:64 ;"
                            >
                                <img 
                                    src="./assets/images/popular-post-1.jpg" 
                                    width="64" 
                                    height="64" 
                                    alt="" 
                                    class="img-cover" 
                                    loading="lazy"
                                >
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

        <?php  
            // retrieve the latest comments from the database
            $stmt = $pdo->query("
                    SELECT comment_text, author_name, created_at 
                    FROM comments
                    ORDER BY created_at DESC
                    LIMIT 3
                ");
            $latest_comments = $stmt->fetchAll();
        ?>

        <ul class="comment-list">

            <?php foreach( $latest_comments as $comment ): ?>
        
                <li>
                    <div class="comment-card">

                        <blockquote class="card-text">
                            “ <?= htmlspecialchars($comment['comment_text']) ?> “
                        </blockquote>

                        <div class="profile-card">

                            <figure class="profile-banner img-holder">
                                <img src="./assets/images/author-6.png" 
                                     width="32" 
                                     height="32"
                                     loading="lazy" 
                                     alt="Jane Cooper" 
                                     class="img-cover">
                            </figure>

                            <div>
                                <p class="card-title">
                                    <?= htmlspecialchars($comment['author_name']) ?>
                                </p>

                                <time 
                                    class="card-date" 
                                    datetime="<?= htmlspecialchars($comment['created_at']) ?>">
                                    <?= date('d F Y, H:i', strtotime($comment['created_at'])) ?>
                                </time>
                            </div>

                        </div>
                    </div>
                </li>

            <?php endforeach; ?>

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