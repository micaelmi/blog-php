<?php
include_once '../functions/db.php';
// Conectar ao banco de dados
$conn = connection();

// Desserializar o valor do cookie 'login' para obter o userId
$loginData = unserialize($_COOKIE['login']);
$userId = $loginData['userId'];

// Consulta SQL para selecionar os artigos do usuário atual
$sql = "SELECT * FROM article WHERE author = ? ORDER BY date DESC";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $userId);
$stmt->execute();
