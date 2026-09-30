CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_text TEXT NOT NULL,
    title VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL DEFAULT '',
    badge VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    word_count INT NOT NULL,
    published_at DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS article_tag (
    article_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (article_id, tag_id),
    FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id)
);