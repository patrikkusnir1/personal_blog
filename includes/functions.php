<?php 


function post_has_category(object $article) {
    // check if post has category and get the category
    $current_category = $_GET["category"] ?? "";

        if ($current_category == "")
        {
            return true;
        }

        if ( in_array($current_category, $article->tags) ) 
        {
            return true;
        };
        return false;
    };
?>