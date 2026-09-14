<?php

class ArticleCollection {
    private array $articles;
    public function __construct(array $articles)
    {
        $this->articles = $articles;
    }

    public function getArticles() {
        return $this->articles;
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
    public function post_has_tags(string $tag) 
    {
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

    public function get_popular_posts() 
    {
        $articles_copy = $this->articles;
        usort($articles_copy, function($a, $b) {
            return $b->getWordCount() - $a->getWordCount() ;
        });
        $popular_posts = array_slice($articles_copy, 0, 3);
        
        return $popular_posts;
    }

    public static function fromPostsData(
        array $posts, array $longerTexts
    ): self 

    {
        
    // Start with an empty array 

        $articles = [];

    // Loop through $longer_texts with $key => $text
        foreach ($longerTexts as $key => $text) {

            // Create new Article using factory static function 
            $article = Article::fromPostData($text, $posts[$key]);
            
            // and push it onto $articles.
            $articles[] = $article;
        }
        // After the loop, return $articles;
        return new self($articles);
    }
}

?>