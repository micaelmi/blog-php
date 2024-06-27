<?php
include_once '../functions/db.php';
function getArticleById($id)
{
  $conn = connection();

  // Consulta SQL para selecionar o artigo com o nome do autor e a linguagem
  $sql = "SELECT article.*, user.name AS authorName, language.name AS lang 
          FROM article
          INNER JOIN user ON article.author = user.userId
          INNER JOIN language ON article.languageId = language.languageId
          WHERE article.articleId = :id";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  $article = $stmt->fetch(PDO::FETCH_ASSOC);

  // Buscar comentários do artigo
  $sqlComments = "SELECT comment.*, user.username AS authorName 
                  FROM comment
                  INNER JOIN user ON comment.author = user.userId
                  WHERE comment.articleId = :id
                  ORDER BY comment.date DESC";
  $stmtComments = $conn->prepare($sqlComments);
  $stmtComments->bindParam(':id', $id, PDO::PARAM_INT);
  $stmtComments->execute();
  $comments = $stmtComments->fetchAll(PDO::FETCH_ASSOC);

  $article['comments'] = $comments;

  return $article;
}
