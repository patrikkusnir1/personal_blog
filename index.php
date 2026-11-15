<?php 
declare(strict_types=1);
require_once __DIR__ . "/includes/config.php";
require 'classes/Article.php';
require 'classes/ArticleCollection.php';
require 'includes/db.php';
require 'includes/functions.php';
/*$longer_texts = [
    "Discover useful tips and practical strategies for working from home as a freelancer, staying focused, managing your time, and becoming more productive every day.", 
    "Learn how self-observation can help you understand your thoughts, emotions, habits, and behavior and become more aware of yourself in everyday life.", 
    "Learn the basic rules and useful tips that can help you understand chess, improve your decision-making, develop a better strategy, and enjoy the game more.", 
    "Discover useful tips and practical strategies for working from home as a freelancer, staying focused, managing your time, and becoming more productive every day.", 
    "Learn how self-observation can help you understand your thoughts, emotions, habits, and behavior and become more aware of yourself in everyday life.",
    "Learn the basic rules and useful tips that can help you understand chess, improve your decision-making, develop a better strategy, and enjoy the game more.", 
    "Discover simple and effective ways to improve your daily productivity, stay focused on important tasks, avoid distractions, and make better use of your time throughout the day." , 
    "Traveling can change the way you see the world by introducing you to new cultures, different traditions, interesting places, and people with completely different experiences and perspectives.", 
    "Reading books is a great way to learn something new, improve your knowledge, develop your imagination, and discover interesting ideas that can help you understand the world better.", 
    "Building better habits takes time and consistency, but small positive changes in your daily routine can gradually improve your productivity, motivation, health, and overall quality of life." 
];
*/


/*$posts = [
    
    [
        "title" => "Helpful Tips for Working from Home as a Freelancer",
        "image" => "./assets/images/recent-post-1.jpg",
        "badge" => "Working Tips",
        "tags"  => ["Productivity", "Work"],
        "word_count" => 100,
        "author" => "Elena",
        "date" => "2024-01-15"
    ],
   
    [
        "title" => "Self-observation is the first step of inner unfolding",
        "image" => "./assets/images/recent-post-2.jpg",
        "badge" => "Lifestyle",
        "tags"  => ["Psychology", "Lifestyle"],
        "word_count" => 400,
        "author" => "Marcus",
        "date" => "2024-02-03",
    ],
    
    [
        "title" => "How to play chess",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Games",
        "tags"  => ["Psychology", "Fun"],
        "word_count" => 700,
        "author" => "Nadia",
        "date" => "2024-02-20",
    ],
    
    [
        "title" => "Simple Ways to Improve Your Daily Productivity and Stay Focused",
        "image" => "./assets/images/recent-post-4.jpg",
        "badge" => "Productivity",
        "tags" => ["Productivity", "Work"],
        "word_count" => 550,
        "author" => "Elena",
        "date" => "2024-03-05",
    ],
    
    [
        "title" => "How Traveling Can Change the Way You See the World",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Travel",
        "tags" => ["Travel", "Lifestyle"],
        "word_count" => 800,
        "author" => "Tomas",
        "date" => "2024-03-22",
    ],
    
    [
        "title" => "The Benefits of Reading Books and Learning Something New",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Education",
        "tags" => ["Books", "Learning"],
        "word_count" => 650,
        "author" => "Nadia",
        "date" => "2024-04-10",
    ],
    
    [
        "title" => "How to Build Better Habits and Make Positive Changes",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Lifestyle",
        "tags" => ["Habits", "Self Improvement"],
        "word_count" => 500,
        "author" => "Marcus",
        "date" => "2024-04-28",
    ],
    
    [
        "title" => "Interesting Facts About Nature That Everyone Should Know",
        "image" => "./assets/images/recent-post-3.jpg",
        "badge" => "Nature",
        "tags" => ["Nature", "Science"],
        "word_count" => 750,
        "author" => "Tomas",
        "date" => "2024-05-14",
    ],
    
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
];*/

// create articles
$collection = ArticleCollection::fromDatabase($pdo);

// get topics from collection and show them
$topics = $collection->get_tags();

// count articles
$articles_total_count = count($collection->getArticles());


// TODO: add in the future guest count
$visit_count = 5;


require 'includes/header.php';

?> 

<!-- MAIN -->

    <main>
            <?php 
                require 'includes/hero.php'; 
                require 'includes/topics-slider.php';
                require 'includes/feature-posts.php';
                require 'includes/popular-tags.php';
                require 'includes/recent-posts.php';
            ?>
    </main>

    <?php require 'includes/footer.php'; ?>