<?php 
declare(strict_types=1);
class Article 
{
    public string $longer_text;
    public string $title;
    public string $image;
    public string $badge;
    public array $tags;
    public int $word_count;
    public string $author;
    public string $date;
    public string $read_time;
    public string $excerpt;

    public function __construct(string $longer_text, string $title, string $image, string $badge, array $tags, int $word_count, string $author, string $date)
    {
        $this->longer_text = $longer_text;
        $this->title       = $title;
        $this->image       = $image;
        $this->badge       = $badge;
        $this->tags        = $tags;
        $this->word_count  = $word_count;
        $this->author      = $author;
        $this->date        = $date;
        $this->read_time   = $this->readtime_count();
        $this->excerpt     = $this->make_excerpt();
    }


    public function make_excerpt(int $limit = 50) 
    {
    // Case 1: text is already short enough - return it untouched
        if ( strlen($this->longer_text) <= $limit ) {
            return $this->longer_text;
        }

        // Case 2 and 3: here the text is too long

        // find a space within $limit
        $space_pos = strrpos( substr( $this->longer_text, 0, $limit ), " " );


        // Case 2: a space was found: cut cleanly at that space
        if ( $space_pos !== false ) {
            return substr( $this->longer_text, 0, $space_pos). "...";
        }

        // Case 3: a space wasn't found, cut at limit with ...
        return substr($this->longer_text, 0, $limit). "...";
    }

    public function readtime_count( int $words_per_minute = 200 ) 
    {
        $read_time = ceil($this->word_count / $words_per_minute);
        if ( $read_time == 1 ) {
            return $read_time . " min";
        }
        return $read_time . " mins";
    }
}

class ArticleCollection {
    public array $articles;
    public function __construct(array $articles)
    {
        $this->articles = $articles;
    }

    public function get_tags() 
{
    $tags_list = [];

    foreach ($this->articles as $article) {
            $tags_list[] = $article->tags;
    }

    $tags_list = array_values(
                array_unique(
                array_merge(...$tags_list)
        )
    );

    return $tags_list;
}
    function post_has_tags(string $tag) {
    $tag_count = 0; 
        foreach($this->articles as $article) 
            {
                if ( in_array($tag, $article->tags) ) 
                    {
                        $tag_count++;
                    };
                    
            }
        return $tag_count;
    }

    function get_popular_posts() 
    {
        $articles_copy = $this->articles;
        usort($articles_copy, function($a, $b) {
            return $b->word_count - $a->word_count;
        });
        $popular_posts = array_slice($articles_copy, 0, 3);
        
        return $popular_posts;
    }

}






$longer_texts = [
    "Discover useful tips and practical strategies for working from home as a freelancer, staying focused, managing your time, and becoming more productive every day.", // done
    "Learn how self-observation can help you understand your thoughts, emotions, habits, and behavior and become more aware of yourself in everyday life.", // done
    "Learn the basic rules and useful tips that can help you understand chess, improve your decision-making, develop a better strategy, and enjoy the game more.", // done
    "Discover useful tips and practical strategies for working from home as a freelancer, staying focused, managing your time, and becoming more productive every day.", // done
    "Learn how self-observation can help you understand your thoughts, emotions, habits, and behavior and become more aware of yourself in everyday life.",//done
    "Learn the basic rules and useful tips that can help you understand chess, improve your decision-making, develop a better strategy, and enjoy the game more.", // done
    "Discover simple and effective ways to improve your daily productivity, stay focused on important tasks, avoid distractions, and make better use of your time throughout the day." , // done
    "Traveling can change the way you see the world by introducing you to new cultures, different traditions, interesting places, and people with completely different experiences and perspectives.", // done
    "Reading books is a great way to learn something new, improve your knowledge, develop your imagination, and discover interesting ideas that can help you understand the world better.", // done
    "Building better habits takes time and consistency, but small positive changes in your daily routine can gradually improve your productivity, motivation, health, and overall quality of life." // done
];



$posts = [
    // done
    [
        "title" => "Helpful Tips for Working from Home as a Freelancer",
        "image" => "./assets/images/recent-post-1.jpg",
        "badge" => "Working Tips",
        "tags"  => ["Productivity", "Work"],
        "word_count" => 100,
        "author" => "Elena",
        "date" => "2024-01-15"
    ],
    //done
    [
        "title" => "Self-observation is the first step of inner unfolding",
        "image" => "./assets/images/recent-post-2.jpg",
        "badge" => "Lifestyle",
        "tags"  => ["Psychology", "Lifestyle"],
        "word_count" => 400,
        "author" => "Marcus",
        "date" => "2024-02-03",
    ],
    // done
    [
        "title" => "How to play chess",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Games",
        "tags"  => ["Psychology", "Fun"],
        "word_count" => 700,
        "author" => "Nadia",
        "date" => "2024-02-20",
    ],
    // done
    [
        "title" => "Simple Ways to Improve Your Daily Productivity and Stay Focused",
        "image" => "./assets/images/recent-post-4.jpg",
        "badge" => "Productivity",
        "tags" => ["Productivity", "Work"],
        "word_count" => 550,
        "author" => "Elena",
        "date" => "2024-03-05",
    ],
    // done
    [
        "title" => "How Traveling Can Change the Way You See the World",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Travel",
        "tags" => ["Travel", "Lifestyle"],
        "word_count" => 800,
        "author" => "Tomas",
        "date" => "2024-03-22",
    ],
    // done
    [
        "title" => "The Benefits of Reading Books and Learning Something New",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Education",
        "tags" => ["Books", "Learning"],
        "word_count" => 650,
        "author" => "Nadia",
        "date" => "2024-04-10",
    ],
    // done
    [
        "title" => "How to Build Better Habits and Make Positive Changes",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Lifestyle",
        "tags" => ["Habits", "Self Improvement"],
        "word_count" => 500,
        "author" => "Marcus",
        "date" => "2024-04-28",
    ],
    // done
    [
        "title" => "Interesting Facts About Nature That Everyone Should Know",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Nature",
        "tags" => ["Nature", "Science"],
        "word_count" => 750,
        "author" => "Tomas",
        "date" => "2024-05-14",
    ],
    // done
    [
        "title" => "Why Learning a New Language Can Be Fun and Useful",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Learning",
        "tags" => ["Languages", "Education"],
        "word_count" => 450,
        "author" => "Elena",
        "date" => "2024-06-01",
    ],

    [
        "title" => "Easy Tips for Creating a More Comfortable Home Office",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Working Tips",
        "tags" => ["Work", "Lifestyle"],
        "word_count" => 600,
        "author" => "Nadia",
        "date" => "2024-06-19",
    ],
];





function create_articles($posts, $longer_texts) {
    /*
Start with an empty array — what would you call it? ($articles, maybe.)
*/
    $articles = [];
/*
    Loop through $longer_texts with $key => $text, same as before.
*/
foreach ($longer_texts as $key => $text) {

 // Create new Article(...) using properties, 
    $article = new Article(
        longer_text: $text,
        title: $posts[$key]["title"],
        image: $posts[$key]["image"],
        badge: $posts[$key]["badge"],
        tags:  $posts[$key]["tags"],
        word_count: $posts[$key]["word_count"],
        author: $posts[$key]["author"],
        date: $posts[$key]["date"],
    );
    // and push it onto $articles.
    $articles[] = $article;
}
// After the loop, return $articles;
return $articles;
}

$articles = create_articles($posts, $longer_texts);

$collection = new ArticleCollection($articles);



require 'includes/functions.php';

function show_categories($articles, $topics) {
    $articles_to_show = 2;
    $tags_array = $topics;


    // define placeholder images - repeating list
    $placeholder_images = [
        "/assets/images/tag1.png",
        "/assets/images/tag2.png",
        "/assets/images/tag3.png",
        "/assets/images/tag4.png",
        "/assets/images/tag5.png",
        "/assets/images/tag6.png",
        "/assets/images/tag7.png",
        "/assets/images/tag8.png",
        "/assets/images/tag9.png",
        "/assets/images/tag10.png",
        "/assets/images/tag11.png",
        "/assets/images/tag12.png",

    ];
    foreach ($tags_array as $index => $tag) {
        // get the image based on index - repeating every 5
        $image_index = $index % count($placeholder_images);
        $image_path = $placeholder_images[$image_index];

    
        $a_url = http_build_query([ 
           "category" => $tag,
           "show"     => $articles_to_show,
        ]);

        echo "
        <li>
            <a class='card tag-btn' href='?$a_url #recent'>
                <img src='$image_path' width='32' height='32' loading='lazy' alt='$tag'>
                <p class='btn-text'>$tag</p>
            </a>
        </li>";
        }
    }

// show topics
function show_topics($articles, $topics) {
    
    $tags_array = $topics;

    // define placeholder images - repeating list
    $placeholder_images = [
        "./assets/images/topic-1.png",
        "./assets/images/topic-2.png",
        "./assets/images/topic-3.png",
        "./assets/images/topic-4.png",
        "./assets/images/topic-5.png",
    ];

    foreach ($tags_array as $index => $tag):
        $tag_count = post_has_tags($articles, $tag);
        $image_index = $index % count($placeholder_images);
        $image_path = $placeholder_images[$image_index];

?>
        <li class="slider-item">
            <?php
            $category_only_array = ["category" => $tag];
            $category_url = http_build_query($category_only_array);
            ?>
            <a href="?<?= $category_url ?>#recent" class='slider-card'>
                <figure class="slider-banner img-holder" style="--width: ; --height: ;">
                    <img src="<?= $image_path ?>" width="507" height="608"
                        loading="lazy" alt="<?= $tag ?>" class="img-cover">
                </figure>
                <div class="slider-content">
                    <span class="slider-title"><?= $tag ?></span>
                    <?php if ($tag_count == 1):?>
                        <p class="slider-subtitle">
                            <?= $tag_count ?> article
                        </p>
                    <?php else: ?>
                        <p class="slider-subtitle">
                            <?= $tag_count ?> articles
                        </p>
                    <?php endif ?>
                </div>
            </a>
        </li>
       <?php endforeach;
    }

// get topics from collection and show them
$topics = $collection->get_tags();

// count articles
$articles_total_count = count($articles);
$articles_per_page = 3;

// TODO: add in the future guest count
$visit_count = 5;


require 'includes/header.php';

?> 



<!-- MAIN -->

    <main>

        <article>
            <!-- 
            -#HERO
        -->
            <section class="hero" id="home" aria-label="home">
                <div class="container">
                    <div class="hero-content">
                        <?php if ($user_logged_in) {
                            echo "<p class='hero-subtitle'>Hello ". $name. "</p>";

                            if ($visit_count % 5 == 0) {
                                echo "<p class='hero-subtitle'>You are my special guest! Nice to see you</p>";
                            }
                        } ?>
                        
                        <h1 class="headline headline1 section-title">
                            <span class="span">I'm Patrik Kusnir </span>
                        </h1>
                        <p class="hero-text">I am graduated pharmacist whose the biggest passion is travelling by train.
                            This blog has been written as my first project during my long self-taught programmer
                            learning path.</p>
                        <div class="input-wrapper">
                            <form>
                                <input type="email" name="email_address" placeholder="Type your email address" required
                                    class="input-field">
                                <button class="btn btn-primary" type="submit">
                                    <span class="primary">Subscribe</span>
                                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="hero-banner">
                        <img src="./assets/images/author.png" width="327" height="490" alt="Patrik Kusnir"
                            class="w-100">
                        <img src="./assets/images/pattern-2.svg" width="27" height="26" alt="shape"
                            class="shape shape-1">
                        <img src="./assets/images/pattern-3.svg" width="27" height="26" alt="shape2"
                            class="shape shape-2">
                    </div>
                    <img src="./assets/images/shadow-1.svg" width="500" height="800" alt="" class="hero-bg hero-bg-1">
                    <img src="./assets/images/shadow-2.svg" width="500" height="500" alt="" class="hero-bg hero-bg-2">
            </section>

            <!-- #TOPICS  -->
            <section class="topics" id="topics" aria-labelledby="topic-label">
                <div class="container">
                    <div class="card topic-card">
                        <div class="card-content">
                            <h2 class="headline headline-2 section-title card-title" id="topic-label">Hot topics</h2>
                        </div>
                        <p class="card-text">
                            Don't miss out on the latest news about psychology and lifestyle. 
                            We have <?= $articles_total_count ?> articles published here on website.
                        </p>
                        <div class="btn-group">
                            <button class="btn-icon" aria-label="previous" data-slider-prev>
                                <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
                            </button>
                            <button class="btn-icon" aria-label="next" data-slider-next>
                                <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                            </button>
                        </div>
                        <div class="slider" data-slider>
                            <ul class="slider-list" data-slider-container>
                                <?php show_topics($articles, $topics) ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 
                #FEATURED POST
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
                        
                        $feature_posts = array_slice( $articles, 0, $articles_to_show );

                        




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
                                            <?php foreach($article->tags as $tag):
                                                $category_only_array = 
                                                    ["category" => $tag];
                                                $category_url = 
                                                http_build_query($category_only_array);      
                                             ?>

                                                <a href="?<?= $category_url.'#recent'?>" class="span hover-2">
                                                    <?= $tag ?> 
                                                </a>
                                            <?php endforeach?>
                                        </div>
                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span"><?= $article->readtime_count() ?></span>
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
                    $articles_to_show_array = ["show" => $articles_to_show];
                    

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

            <!-- 
                #POPULAR TAGS
            -->

            <section class="tags" aria-labelledby="tag-label" id="tag-label">
                <div class="container">
                    <h2 class="headline headline-2 section-title">
                        <span class="span">Popular Tags</span>
                    </h2>

                    <p class="section-text">
                        Most searched keywords
                    </p>

                    <ul class="grid-list">
                    <?php
                        show_categories($articles, $topics);
                    ?>
                    </ul>
                </div>
            </section>

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
                            Don't miss the latest trends. We have currently <?= count($articles) ?> recent posts on our website across <?= count($topics) ?> topics.
                        </p>
                        <ul class="grid-list">
                            <?php
                            $current_category = $_GET["category"] ?? "";

                            // get category and filter posts by category
                            $filtered_posts = array_filter($articles, 'post_has_category');

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
                                        <?= htmlspecialchars($article->excerpt) ?>
                                    </p>

                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                    <?php foreach ($article->tags as $tag): 
                                    $category_only_array = ["category" => $tag];
                                    $category_url = 
                                    http_build_query($category_only_array)
                                    ?>

                                            <a href="?<?= $category_url?>#recent"   class="span hover-2">
                                                <?= htmlspecialchars($tag) ?>
                                            </a>
                                    <?php endforeach ?>
                                        </div>

                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span"><?= htmlspecialchars($article->readtime_count()) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach ?>
                        </ul>
                        <nav aria-label="pagination" class="pagination">
                            <?php
                            




                            //  create pagination backward arrow

                            $category_and_page_backward_array= http_build_query(  
                                ["category" => $current_category,
                                 "page" => $current_page - 1,
                                ]
                            ); 


                                if ( $current_page > 1)
                                {
                                echo '<a href="?'.$category_and_page_backward_array.'#recent" class="pagination-btn" aria-label="previous page">
                                    <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
                                </a>';
                                };
                            
                            // create pagination buttons based on articles count
                            $pagination = 1;

                            while ( $pagination < $pagination_count + 1 ) {
                                $category_and_page_array = [
                                "category" => $current_category, 
                                "page"      => $pagination
                            ];

                            $category_and_page_url = 
                             http_build_query($category_and_page_array); 

                                
                                if ( $pagination == $current_page ) 
                                {
                                    echo "<a href='?$category_and_page_url#recent' class='pagination-btn active'>$pagination</a>";
                                } 
                                else 
                                {
                                    echo "<a href='?$category_and_page_url#recent' class='pagination-btn'>$pagination</a>";
                                }
                    
                                $pagination++;
                            } 
                            

                            //  create pagination forward arrow -->
                            $category_and_page_forward_array= http_build_query(  
                                ["category" => $current_category,
                                 "page" => $current_page + 1
                                ]
                            ); 

                                if ( $current_page <= $pagination_count - 1) 
                                {
                                    echo '<a href="?'.$category_and_page_forward_array.'#recent" class="pagination-btn" aria-label="next page">
                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </a>';
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
                                    $popular_articles = get_popular_posts(($articles));
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
                                                            <?= $article->read_time 
                                                            ?>
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
        </article>
    </main>

    <?php require 'includes/footer.php'; ?>