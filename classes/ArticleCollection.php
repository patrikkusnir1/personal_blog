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

    public static function fromDatabase(PDO $pdo): self 
    {
    // Start with an empty array 
        $articles = [];

    // database query
    $stmt = $pdo->query("
            SELECT
                articles.*,
                COUNT(DISTINCT comments.comment_id) AS comment_count,
                GROUP_CONCAT(DISTINCT tags.name ORDER BY tags.name ASC SEPARATOR ',') AS tags_list
            FROM articles
            LEFT JOIN comments ON articles.id = comments.article_id
            LEFT JOIN article_tag ON articles.id = article_tag.article_id
            LEFT JOIN tags ON article_tag.tag_id = tags.id
            GROUP BY articles.id
            ORDER BY articles.published_at DESC
        ");

    $rows = $stmt->fetchAll();

    // Loop through $rows 
        foreach ($rows as $row) {

            // Create new Article using factory static function 
            // and push it onto $articles.
            $articles[] = Article::fromDatabaseRow($row);

        }
        // After the loop, return $articles;
        return new self($articles);
    }
}

?>