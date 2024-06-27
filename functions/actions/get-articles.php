<?php
include_once '../functions/db.php';
// Conectar ao banco de dados
$conn = connection();

// Consulta SQL para selecionar todos os artigos com o nome do autor
$sql = "SELECT article.*, user.name AS authorName, language.name AS lang FROM article
        INNER JOIN user ON article.author = user.userId
        INNER JOIN language ON article.languageId = language.languageId
        ORDER BY article.date DESC";
$stmt = $conn->query($sql);
