<?php

$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
$articleId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
echo $articleId;
$loginData = unserialize($_COOKIE['login']);
$userId = $loginData['userId'];

include_once '../db.php';


$db = connection();


$sql = "
INSERT INTO comment (text, date, articleId, author) VALUES (:comment, NOW(), :article, :author);
";

$stmt = $db->prepare($sql);
$stmt->bindParam(':comment', $comment);
$stmt->bindParam(':article', $articleId);
$stmt->bindParam(':author', $userId);

if ($stmt->execute()) {
  $db = null;
  header("location:../../pages/article.php?id=" . $articleId . "#comments");
} else {
  header("location:../../pages/article.php?error=error creating comment");
}
