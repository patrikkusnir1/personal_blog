<?php 

// get tags from all the posts

function get_tags(array $articles) 
{
    $tags_list = [];

    foreach ($articles as $article) {
            $tags_list[] = $article->tags;
    }

    $tags_list = array_values(
                array_unique(
                array_merge(...$tags_list)
        )
    );

    return $tags_list;
}

function post_has_category($post) {
    // check if post has category and get the category
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


// check if article has tags and count them

function post_has_tags($articles, $tag) {
    $tag_count = 0; 
        foreach($articles as $article) 
            {
                if ( in_array($tag, $article->tags) ) 
                    {
                        $tag_count++;
                    };
                    
            }
        return $tag_count;
    }

// add read time to every post on the website




// get popular posts

function get_popular_posts($articles) 
{
    $articles_copy = $articles;
    usort($articles_copy, function($a, $b) {
        return $b->word_count - $a->word_count;
    });
    $popular_posts = array_slice($articles_copy, 0, 3);
    
    return $popular_posts;
}



?>