<?php 
declare(strict_types=1);
require_once __DIR__ . "/includes/config.php";
require 'classes/Article.php';
require 'classes/ArticleCollection.php';
require 'includes/db.php';
require 'includes/functions.php';


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