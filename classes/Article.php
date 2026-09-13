<?php 
class Article 
{
    public string $longer_text;
    public string $title;
    public string $image;
    public string $badge;
    public array $tags;
    private int $word_count;
    public string $author;
    public string $date;
    private string $read_time;
    private string $excerpt;

    public function __construct(string $longer_text, string $title, string $image, string $badge, array $tags, int $word_count, string $author, string $date)
    {
        $this->longer_text = $longer_text;
        $this->title       = $title;
        $this->image       = $image;
        $this->badge       = $badge;
        $this->tags        = $tags;
        $this->word_count  = $word_count;
        $this->author      = $author;
        $this->date        = $date;
        $this->read_time   = $this->readtime_count();
        $this->excerpt     = $this->make_excerpt();
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

    public function readtime_count( int $words_per_minute = 200 ) 
    {
        $read_time = ceil($this->word_count / $words_per_minute);
        if ( $read_time == 1 ) {
            return $read_time . " min";
        }
        return $read_time . " mins";
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
}



?>