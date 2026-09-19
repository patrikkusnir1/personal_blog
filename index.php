<?php 
declare(strict_types=1);
require 'classes/Article.php';
require 'classes/ArticleCollection.php';

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

// create articles
$collection = ArticleCollection::fromPostsData($posts, $longer_texts);

require 'includes/functions.php';

function show_categories( $topics ) {
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
        $image_path = pick_image($placeholder_images, $index);

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
function show_topics($collection, $topics) {
    
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
        $tag_count = $collection->post_has_tags($tag);
        $image_path = pick_image($placeholder_images, $index);

?>
        <li class="slider-item">
            <?php $category_url = Article::build_category_url($tag) ?>

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
$articles_total_count = count($collection->getArticles());
$articles_per_page = 3;

// TODO: add in the future guest count
$visit_count = 5;


require 'includes/header.php';

?> 

<!-- MAIN -->

    <main>

        <article>
            <?php 

                include 'includes/hero.php'; 
                include 'includes/topics-slider.php';
                include 'includes/feature-posts.php';
                include 'includes/popular-tags.php';
                include 'includes/recent-posts.php';
                include 'includes/side-bar.php'
            ?>
        </article>
    </main>

    <?php require 'includes/footer.php'; ?>