<?php 
require __DIR__ . "/../includes/db.php";
require __DIR__ . "/../includes/posts.php";

function insert_article(PDO $pdo, array $post, string $longer_text ): int {
	// build sql
	$sql = "INSERT INTO articles (full_text, title, image, badge, author, word_count, published_at) VALUES (:full_text, :title, :image, :badge, :author, :word_count, :published_at)";
	// prepare
	$stmt = $pdo->prepare($sql);
	// execute with the right values from $post and $longer_text
	$stmt->execute([
		":full_text" => $longer_text,
		":title"     => $post['title'],
		":image"     => $post['image'],
		":badge"     => $post['badge'],
		":author"    => $post['author'], 
		":word_count" => $post['word_count'],
		":published_at" => $post['date'],
	]);
	// return new id
	$newId = $pdo->lastInsertId();
	return $newId;
}


function get_or_create_tag(PDO $pdo, string $tagName): int
{
    // try to find an existing row with this name
    $sql  = "SELECT id FROM tags WHERE name = :name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":name" => $tagName]);
    $row  = $stmt->fetch();

    // if found, return its id
    if ($row !== false) {
        return $row['id'];
    }
    // if not found, insert it, and return new id
    else {
        $sql = "INSERT INTO tags (name) VALUES (:name)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":name" => $tagName]);
        return $pdo->lastInsertId();
    }
}

function link_tag_to_article(PDO $pdo, int $article_id, int $tag_id): void {
		$sql = "INSERT INTO article_tag (article_id, tag_id) VALUES (:article_id, :tag_id)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([":article_id" => $article_id,
						":tag_id"     => $tag_id]);
}

foreach ($posts as $key => $post) {

	$newId = insert_article($pdo, $post, $longer_texts[$key]);

	foreach ($post["tags"] as $tag) {
		$tagId = get_or_create_tag($pdo, $tag);
		// link tagId and newId
		link_tag_to_article($pdo, $newId, $tagId);
	}
}
