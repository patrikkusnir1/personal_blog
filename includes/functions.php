<?php 
// make excerpt from longer text (full blog text)

function make_excerpt($text, $limit = 50) 
{
// Case 1: text is already short enough - return it untouched
    if ( strlen($text) <= $limit ) {
        return $text;
    }

// Case 2 and 3: here the text is too long

// find a space within $limit
$space_pos = strrpos( substr( $text, 0, $limit ), " " );


// Case 2: a space was found: cut cleanly at that space
if ( $space_pos !== false ) {
    return substr( $text, 0, $space_pos). "...";
}

// Case 3: a space wasn't found, cut at limit with ...
return substr($text, 0, $limit). "...";
} 


// count read time

function readtime_count($word_count, $words_per_minute = 200) 
{
    $read_time = ceil($word_count / $words_per_minute);
    if ( $read_time == 1 ) {
        return $read_time . " min";
    }
    return $read_time . " mins";
}

// extract short text from full text and add it to posts array

function add_excerpts_to_posts($posts, $longer_texts, $limit) 
{
    foreach ( $longer_texts as $key => $text ) 
    { 
        $posts[$key]["excerpt"] = make_excerpt($text, $limit);
    }
    return $posts;
}


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

function add_read_time($posts) 
{
    foreach ( $posts as $key => $post) 
    {
        $posts[$key]["read_time"] = readtime_count($post["word_count"]);
    }
    return $posts;
}


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