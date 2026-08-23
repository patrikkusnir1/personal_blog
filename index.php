<?php 


$longer_texts = [
    "Discover useful tips and practical strategies for working from home as a freelancer, staying focused, managing your time, and becoming more productive every day.",
    "Learn how self-observation can help you understand your thoughts, emotions, habits, and behavior and become more aware of yourself in everyday life.",
    "Learn the basic rules and useful tips that can help you understand chess, improve your decision-making, develop a better strategy, and enjoy the game more.",
    "Discover useful tips and practical strategies for working from home as a freelancer, staying focused, managing your time, and becoming more productive every day.",
    "Learn how self-observation can help you understand your thoughts, emotions, habits, and behavior and become more aware of yourself in everyday life.",
    "Learn the basic rules and useful tips that can help you understand chess, improve your decision-making, develop a better strategy, and enjoy the game more.",
    "Discover simple and effective ways to improve your daily productivity, stay focused on important tasks, avoid distractions, and make better use of your time throughout the day.",
    "Traveling can change the way you see the world by introducing you to new cultures, different traditions, interesting places, and people with completely different experiences and perspectives.",
    "Reading books is a great way to learn something new, improve your knowledge, develop your imagination, and discover interesting ideas that can help you understand the world better.",
    "Building better habits takes time and consistency, but small positive changes in your daily routine can gradually improve your productivity, motivation, health, and overall quality of life."
];
$posts = [
    [
        "title" => "Helpful Tips for Working from Home as a Freelancer",
        "image" => "./assets/images/recent-post-1.jpg",
        "badge" => "Working Tips",
        "tags"  => ["Productivity", "Work"],
        "word_count" => 100,
    ],
    [
        "title" => "Self-observation is the first step of inner unfolding",
        "image" => "./assets/images/recent-post-2.jpg",
        "badge" => "Lifestyle",
        "tags"  => ["Psychology", "Lifestyle"],
        "word_count" => 400,
    ],
    [
        "title" => "How to play chess",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Games",
        "tags"  => ["Psychology", "Fun"],
        "word_count" => 700,
    ],
    [
        "title" => "Simple Ways to Improve Your Daily Productivity and Stay Focused",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Productivity",
        "tags" => ["Productivity", "Work"],
        "word_count" => 550,
    ],

    [
        "title" => "How Traveling Can Change the Way You See the World",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Travel",
        "tags" => ["Travel", "Lifestyle"],
        "word_count" => 800,

    ],

    [
        "title" => "The Benefits of Reading Books and Learning Something New",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Education",
        "tags" => ["Books", "Learning"],
        "word_count" => 650,
    ],

    [
        "title" => "How to Build Better Habits and Make Positive Changes",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Lifestyle",
        "tags" => ["Habits", "Self Improvement"],
        "word_count" => 500,
    ],

    [
        "title" => "Interesting Facts About Nature That Everyone Should Know",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Nature",
        "tags" => ["Nature", "Science"],
        "word_count" => 750,
    ],

    [
        "title" => "Why Learning a New Language Can Be Fun and Useful",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Learning",
        "tags" => ["Languages", "Education"],
        "word_count" => 450,
    ],

    [
        "title" => "Easy Tips for Creating a More Comfortable Home Office",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Working Tips",
        "tags" => ["Work", "Lifestyle"],
        "word_count" => 600,
    ],
];
// make excerpt from longer text (full blog text)
function make_excerpt($text, $limit = 50) {
    return substr($text,0,strrpos( substr( $text, 0, $limit ), " " ))   . "...";
}

// count readtime
function readtime_count($word_count, $words_per_minute = 200) {
    $read_time = ceil($word_count / $words_per_minute);
    if ($read_time == 1) {
        return $read_time . " min";
    }
    return $read_time . " mins";
}


function add_excerpts_to_posts($posts, $longer_texts, $limit) 
{
    foreach ( $longer_texts as $key => $text ) 
    { 
        $posts[$key]["excerpt"] = make_excerpt($text, $limit);
    }
    return $posts;
}


function add_read_time($posts) {
    foreach ( $posts as $key => $post) 
    {
        $posts[$key]["read_time"] = readtime_count($post["word_count"]);
    }
    return $posts;
}

function get_tags($posts) 
{
    $tags_list = [];
    foreach ($posts as $post) 
        {
            $tags_list[] = $post["tags"];
        }
    $tags_list_merged = array_merge(...$tags_list);
    $tags_list_cleaned = array_values(array_unique($tags_list_merged));
    return $tags_list_cleaned;
};

function show_categories($posts) {
    $tags_array = get_tags($posts);
    $img_count = 1;
    foreach ($tags_array as $tag)
    {
        echo
        "<li>
            <a class='card tag-btn' href='./?category=$tag'>
                <img src='./assets/images/tag$img_count.png' width='32' height='32' loading='lazy' alt='$tag'>
                <p class='btn-text'>$tag</p>
            </a>
        </li>";
        $img_count++;
    }
}




// check if post has category and get the category
function post_has_category($post) {
    // get category
    $current_category = $_GET["category"] ?? "";

        if ($current_category == "")
        {
            return true;
        }

        if ( in_array($current_category, $post["tags"]) ) 
        {
            return true;
        };
        return false;
    };






// filter posts by category
function filter_posts_by_category($posts) {
    $tags = get_tags($posts);
    foreach ( $tags as $tag) 
    {
        foreach ($posts as $post) {
            // if (array_filter($post["tags"], in_array($current_category, $post["tags"])))
            { echo '
                            <li class="recent-post-card">
                                <figure class="card-banner img-holder" style="--width: 271; --height: 258 ;">
                                
                                    <img src=" ' . $post["image"]  .  '  " 
                                        alt="<' . htmlspecialchars($post["title"]) . '" 
                                        width="271" 
                                        height="258" 
                                        class="img-cover" 
                                        loading="lazy">
                                </figure>
                                <div class="card-content">
                                    <a href="#" class="card-badge"> '.htmlspecialchars($post["badge"]).' </a>

                                    <h3 class="headline headline-3 card-title">
                                        <a href="#" class="link hover-2">
                                            ' .htmlspecialchars($post["title"]). '
                                        </a>
                                    </h3>
                                    <p class="card-text">
                                        ' .htmlspecialchars($post["excerpt"]). '
                                    </p>

                                    <div class="card-wrapper">
                                        <div class="card-tag">';
                                        // end of first echo
                                            foreach ($post["tags"] as $tag) 
                                            {
                                                echo '<a href="#" class="span hover-2"> '.htmlspecialchars($tag).'</a>';
                                            };
                                    // start of second echo
                            echo '       </div>

                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span"> ' . htmlspecialchars($post["read_time"])  .  '
                                        </div>
                                    </div>
                                </div>
                            </li>';
            }; 
        };
    };
};


// applying function to our posts
$posts = add_excerpts_to_posts($posts, $longer_texts, 100);
$posts = add_read_time($posts);




$topics = ["Sport", "Travel", "Design", "Movie"];

$articles_total_count = count($posts);
$articles_per_page = 3;

$pagination_count = ceil($articles_total_count / $articles_per_page);
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
                            echo "<p class='hero-subtitle'>Hello ". $name . "</p>";

                            if ($visit_count % 5 == 0) {
                                echo "<p class='hero-subtitle'>You are my special guest! Nice to see you</p>";
                            }
                        } ?>
                        
                        <h1 class="headline headline1 section-title">
                            <span class="span">I'm <?= $full_name ?> </span>
                        </h1>
                        <p class="hero-text">I am graduated pharmacist whose the biggest passion is travelling by train.
                            This blog has been written as my first project during my long self-taught programmer
                            learning path.</p>
                        <div class="input-wrapper">
                            <input type="email" name="email_address" placeholder="Type your email address" required
                                class="input-field">
                            <button class="btn btn-primary">
                                <span class="primary">Subscribe</span>
                                <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                            </button>
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
                            Don't miss out on the latest news about Train Travel tips and Life in Russia. 
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
                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: ; --height: ;">
                                            <img src="./assets/images/topic-1.png" width="507" height="608"
                                                loading="lazy" alt="Sport" class="img-cover">
                                        </figure>
                                        <div class="slider-content">
                                            <span class="slider-title">Sport</span>
                                            <p class="slider-subtitle">38 articles</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                                            <img src="./assets/images/topic-2.png" width="507" height="618"
                                                loading="lazy" alt="Travel" class="img-cover">
                                        </figure>
                                        <div class="slider-content">
                                            <span class="slider-title">Travel</span>
                                            <p class="slider-subtitle">38 articles</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                                            <img src="./assets/images/topic-3.png" width="507" height="618"
                                                loading="lazy" alt="Design" class="img-cover">
                                        </figure>
                                        <div class="slider-content">
                                            <span class="slider-title">Design</span>
                                            <p class="slider-subtitle">78 articles</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                                            <img src="./assets/images/topic-4.png" width="507" height="618"
                                                loading="lazy" alt="Movie" class="img-cover">
                                        </figure>
                                        <div class="slider-content">
                                            <span class="slider-title">Movie</span>
                                            <p class="slider-subtitle">125 articles</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                                            <img src="./assets/images/topic-5.png" width="507" height="618"
                                                loading="lazy" alt="Movie" class="img-cover">
                                        </figure>
                                        <div class="slider-content">
                                            <span class="slider-title">Lifestyle</span>
                                            <p class="slider-subtitle">78 articles</p>
                                        </div>
                                    </a>
                                </li>
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
                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/featured-1.png"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover"
                                        width="1602" loading="lazy" height="903">
                                </figure>
                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Travel</a>
                                            <a href="#" class="span hover-2">#Lifestyle</a>
                                        </div>
                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">3 mins read</span>
                                        </div>

                                    </div>
                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Self-observation is the first step of inner unfolding
                                        </a>
                                    </h3>
                                    <div class="card-wrapper">
                                        <div class="profile-card">
                                            <img src="./assets/images/author-1.png" width="48" height="48"
                                                loading="lazy" alt="Joseph" class="profile-banner">

                                            <div>
                                                <p class="card-title">Joseph</p>
                                                <p class="card-subtitle">25 Nov 2022</p>
                                            </div>
                                        </div>
                                        <a href="#" class="card-btn">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/featured-2.png"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover"
                                        width="1602" loading="lazy" height="903">
                                </figure>
                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>
                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>
                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">6 mins read</span>
                                        </div>

                                    </div>
                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Self-observation is the first step of inner unfolding
                                        </a>
                                    </h3>
                                    <div class="card-wrapper">
                                        <div class="profile-card">
                                            <img src="./assets/images/author-1.png" width="48" height="48"
                                                loading="lazy" alt="Joseph" class="profile-banner">

                                            <div>
                                                <p class="card-title">Joseph</p>
                                                <p class="card-subtitle">25 Nov 2022</p>
                                            </div>
                                        </div>
                                        <a href="#" class="card-btn">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/featured-3.png"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover"
                                        width="1602" loading="lazy" height="903">
                                </figure>
                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>
                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>
                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">6 mins read</span>
                                        </div>

                                    </div>
                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Self-observation is the first step of inner unfolding
                                        </a>
                                    </h3>
                                    <div class="card-wrapper">
                                        <div class="profile-card">
                                            <img src="./assets/images/author-1.png" width="48" height="48"
                                                loading="lazy" alt="Joseph" class="profile-banner">

                                            <div>
                                                <p class="card-title">Joseph</p>
                                                <p class="card-subtitle">25 Nov 2022</p>
                                            </div>
                                        </div>
                                        <a href="#" class="card-btn">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/featured-4.png"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover"
                                        width="1602" loading="lazy" height="903">
                                </figure>
                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>
                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>
                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">6 mins read</span>
                                        </div>

                                    </div>
                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Self-observation is the first step of inner unfolding
                                        </a>
                                    </h3>
                                    <div class="card-wrapper">
                                        <div class="profile-card">
                                            <img src="./assets/images/author-1.png" width="48" height="48"
                                                loading="lazy" alt="Joseph" class="profile-banner">

                                            <div>
                                                <p class="card-title">Joseph</p>
                                                <p class="card-subtitle">25 Nov 2022</p>
                                            </div>
                                        </div>
                                        <a href="#" class="card-btn">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/featured-5.png"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover"
                                        width="1602" loading="lazy" height="903">
                                </figure>
                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>
                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>
                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">6 mins read</span>
                                        </div>

                                    </div>
                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Self-observation is the first step of inner unfolding
                                        </a>
                                    </h3>
                                    <div class="card-wrapper">
                                        <div class="profile-card">
                                            <img src="./assets/images/author-1.png" width="48" height="48"
                                                loading="lazy" alt="Joseph" class="profile-banner">

                                            <div>
                                                <p class="card-title">Joseph</p>
                                                <p class="card-subtitle">25 Nov 2022</p>
                                            </div>
                                        </div>
                                        <a href="#" class="card-btn">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-secondary">
                        <span class="span">Show more posts</span>
                        <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                    </a>
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
                        show_categories($posts);
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
                            Don't miss the latest trends. We have currently <?= count($posts) ?> recent posts on our website across <?= count($topics) ?> topics.
                        </p>
                        <ul class="grid-list">
                            <?php
                            // get number where user clicked
                            $current_page = $_GET["page"] ?? "1";
                            // filter posts
                            
                            $posts = array_filter($posts, 'post_has_category');
                            $articles_total_count = count($posts);
                            $pagination_count = ceil( $articles_total_count / $articles_per_page );

                            // show only 3 articles per page
                            
                            $posts = array_slice( $posts, ( ($current_page - 1) * $articles_per_page), $articles_per_page  );
                            
    
                            // show posts
                            foreach ($posts as $post): ?>
                            
                            <li class="recent-post-card">
                                <figure class="card-banner img-holder" style="--width: 271; --height: 258 ;">
                                
                                    <img src="<?= $post["image"] ?>" 
                                        alt="<?= htmlspecialchars($post["title"]) ?>" 
                                        width="271" 
                                        height="258" 
                                        class="img-cover" 
                                        loading="lazy">
                                </figure>
                                <div class="card-content">
                                    <a href="#" class="card-badge"><?= htmlspecialchars($post["badge"]) ?></a>

                                    <h3 class="headline headline-3 card-title">
                                        <a href="#" class="link hover-2">
                                            <?= htmlspecialchars($post["title"]) ?></a>
                                    </h3>
                                    <p class="card-text">
                                        <?= htmlspecialchars($post["excerpt"]) ?>
                                    </p>

                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <?php foreach ($post["tags"] as $tag): ?>

                                            <a href="#" class="span hover-2"><?= htmlspecialchars($tag) ?></a>
                                            <?php endforeach ?>
                                        </div>

                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span"><?= htmlspecialchars($post["read_time"]) ?></span>
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
                            echo '<a href="?page=' .($current_page - 1 ).'" class="pagination-btn" aria-label="previous page">
                                <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
                            </a>';
                            };
                            
                            

                            // create pagination buttons based on articles count 
                            
                                $current_category = $_GET["category"] ?? "";
                                $pagination = 1;
                                while ( $pagination < $pagination_count + 1 ) 
                                {
                                    if ( $pagination == $current_page ) 
                                    {
                                        echo "<a href='?category={$current_category}&page={$pagination}' class='pagination-btn active'>$pagination</a>";
                                    } 
                                    else 
                                    {
                                        echo "<a href='?category={$current_category}&page={$pagination}' class='pagination-btn'>$pagination</a>";
                                    }
                        
                                    $pagination++;
                                } 
                            

                            //  create pagination forward arrow -->
                                if ( $current_page <= $pagination_count - 1) 
                                {
                                    echo '<a href="?category='.$current_category.'&page=' .($current_page + 1).'" class="pagination-btn" aria-label="next page">
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
                                <li>
                                    <div class="popular-card">
                                        <figure class="card-banner img-holder" style="--width:64 ; --height:64 ;"
                                            loading="lazy">
                                            <img src="./assets/images/popular-post-1.jpg" width="64" height="64" alt=""
                                                class="img-cover">
                                        </figure>
                                        <div class="card-content">
                                            <h4 class="headline headline-4 card-title">
                                                <a href="#" class="link hover-2">Creating is a privilege but it’s also a
                                                    gift</a>
                                            </h4>
                                            <div class="wrapper">
                                                <p class="card-subtitle">
                                                    15 mins read
                                                </p>
                                                <time class="publish-date" datetime="2022-04-15">
                                                    15 April 2022
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-card">
                                        <figure class="card-banner img-holder" style="--width:64 ; --height:64 ;"
                                            loading="lazy">
                                            <img src="./assets/images/popular-post-2.jpg" width="64" height="64" alt=""
                                                class="img-cover">
                                        </figure>
                                        <div class="card-content">
                                            <h4 class="headline headline-4 card-title">
                                                <a href="#" class="link hover-2">Being unique is better than being
                                                    perfect</a>
                                            </h4>
                                            <div class="wrapper">
                                                <p class="card-subtitle">
                                                    15 mins read
                                                </p>
                                                <time class="publish-date" datetime="2022-04-15">
                                                    15 April 2022
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-card">
                                        <figure class="card-banner img-holder" style="--width:64 ; --height:64 ;"
                                            loading="lazy">
                                            <img src="./assets/images/popular-post-3.jpg" width="64" height="64" alt=""
                                                class="img-cover">
                                        </figure>
                                        <div class="card-content">
                                            <h4 class="headline headline-4 card-title">
                                                <a href="#" class="link hover-2">Every day, in every city and town
                                                    across
                                                    the country</a>
                                            </h4>
                                            <div class="wrapper">
                                                <p class="card-subtitle">
                                                    15 mins read
                                                </p>
                                                <time class="publish-date" datetime="2022-04-15">
                                                    15 April 2022
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-card">
                                        <figure class="card-banner img-holder" style="--width:64 ; --height:64 ;"
                                            loading="lazy">
                                            <img src="./assets/images/popular-post-4.jpg" width="64" height="64" alt=""
                                                class="img-cover">
                                        </figure>
                                        <div class="card-content">
                                            <h4 class="headline headline-4 card-title">
                                                <a href="#" class="link hover-2">Your voice, your mind, your story, your
                                                    vision</a>
                                            </h4>
                                            <div class="wrapper">
                                                <p class="card-subtitle">
                                                    15 mins read
                                                </p>
                                                <time class="publish-date" datetime="2022-04-15">
                                                    15 April 2022
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-card">
                                        <figure class="card-banner img-holder" style="--width:64 ; --height:64 ;"
                                            loading="lazy">
                                            <img src="./assets/images/popular-post-2.jpg" width="64" height="64" alt=""
                                                class="img-cover">
                                        </figure>
                                        <div class="card-content">
                                            <h4 class="headline headline-4 card-title">
                                                <a href="#" class="link hover-2">Being unique is better than being
                                                    perfect</a>
                                            </h4>
                                            <div class="wrapper">
                                                <p class="card-subtitle">
                                                    15 mins read
                                                </p>
                                                <time class="publish-date" datetime="2022-04-15">
                                                    15 April 2022
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
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

