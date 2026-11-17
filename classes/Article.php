<?php 
class Article 
{
    public int $id;
    public string $longer_text;
    public string $title;
    public ?string $image;
    public ?string $badge;
    public array $tags;
    private int $word_count;
    public ?string $author;
    public string $date;
    private string $read_time;
    private string $excerpt;
    public int $comment_count;

    public function __construct(int $id, string $longer_text, string $title, ?string $image, ?string $badge, array $tags, int $word_count, ?string $author, string $date, int $comment_count)
    {
        $this->id            = $id; 
        $this->longer_text   = $longer_text;
        $this->title         = $title;
        $this->image         = $image;
        $this->badge         = $badge;
        $this->tags          = $tags;
        $this->word_count    = $word_count;
        $this->author        = $author;
        $this->date          = $date;
        $this->read_time     = $this->readtime_count();
        $this->excerpt       = $this->make_excerpt();
        $this->comment_count = $comment_count;
    }

    public function getReadTime():string {
        return $this->read_time;
    }

    public function getExcerpt():string {
        return $this->excerpt;
    }

    public function getWordCount():int {
        return $this->word_count;
    }

    public function setWordCount(int $count):void 
    {
        if ($count < 0) {
            throw new InvalidArgumentException("word count cannot be negative");
        }
        $this->word_count = $count;
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

    public function readtime_count(): string 
    {
        $read_time = ceil($this->word_count / WORDS_PER_MINUTE);
        // if ( $read_time == 1 ) {
        //     return $read_time . " min";
        // }
        return $read_time . ($read_time == 1 ? " min" : " mins");
    }

    public function post_has_category() {
    // check if post has category and get the category
    $current_category = $_GET["category"] ?? "";

        if ($current_category == "")
        {
            return true;
        }

        if ( in_array($current_category, $this->tags) ) 
        {
            return true;
        };
        return false;
    }

    // factory function
    public static function fromDatabaseRow ( array $row ): self
    {
        $tags = !empty($row['tags_list']) 
            ? explode(',', $row['tags_list']) 
            : [];

        return new self(
            id:            (int) $row['id'],
            longer_text:   (string) ($row['full_text'] ?? ''),
            title:         (string) $row["title"],
            image:         $row["image"] ?? null,
            badge:         $row["badge"] ?? null,
            tags:          $tags,
            word_count:    (int)($row["word_count"] ?? 0),
            author:        $row["author"] ?? null,
            date:          (string) $row["published_at"],
            comment_count: (int) ($row['comment_count'] ?? 0)
        );
    }

    public static function build_category_url(string $tag): string 
    {
        return http_build_query(["category" => $tag]);
    }

    public function renderTagLinks():string {
        $html = "";
        foreach ($this->tags as $tag) { 

            $category_url = Article::build_category_url($tag);
       
            $html .= '<a href="?' . $category_url . '#recent" class="span hover-2">'.htmlspecialchars($tag) . '</a>';
        }

        return $html;
    }

    public static function findById(PDO $pdo, int $id): ?self 
    {
        $stmt = $pdo->prepare("
            SELECT 
                articles.*,
                COUNT(DISTINCT comments.comment_id) AS comment_count,
                GROUP_CONCAT(DISTINCT tags.name ORDER BY tags.name ASC SEPARATOR ',') AS tags_list
            FROM articles 
            LEFT JOIN comments ON articles.id = comments.article_id
            LEFT JOIN article_tag ON articles.id = article_tag.article_id
            LEFT JOIN tags ON article_tag.tag_id = tags.id
            WHERE articles.id = :id
            GROUP BY articles.id   
        ");

        $stmt->execute([":id" => $id]);
        $row = $stmt->fetch();

        if (!$row) {
            return null; 
        }

        return self::fromDatabaseRow($row); 
    }
}

?>