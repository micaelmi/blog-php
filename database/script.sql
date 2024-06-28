CREATE DATABASE IF NOT EXISTS blog_php;
USE blog_php;

-- Tabela user
CREATE TABLE user (
    userId INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE
);

-- Tabela language
CREATE TABLE language (
    languageId INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    abbreviation VARCHAR(10) NOT NULL
);

-- Tabela article
CREATE TABLE article (
    articleId INT AUTO_INCREMENT PRIMARY KEY,
    pictureUrl VARCHAR(255),
    title VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    date DATETIME NOT NULL,
    languageId INT,
    author INT,
    FOREIGN KEY (languageId) REFERENCES language(languageId),
    FOREIGN KEY (author) REFERENCES user(userId)
);

-- Tabela comment
CREATE TABLE comment (
    commentId INT AUTO_INCREMENT PRIMARY KEY,
    text TEXT NOT NULL,
    date DATETIME NOT NULL,
    articleId INT,
    author INT,
    FOREIGN KEY (articleId) REFERENCES article(articleId) ON DELETE CASCADE,
    FOREIGN KEY (author) REFERENCES user(userId) ON DELETE CASCADE
);

-- Insert languages
INSERT INTO language (
    languageId, name, abbreviation
) VALUES (
    1, "Portuguese", "pt"
), (
    2, "English", "en"
), (
    3, "Espanish", "es"
);
