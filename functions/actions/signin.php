<?php

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);

include_once '../db.php';

$db = connection();
$sql = "SELECT userId, name, password FROM user WHERE email = :email";
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$result || !password_verify($password, $result['password'])) {
  $error = "?email=" . urlencode($email) . "&error=Incorrect credentials";
  header("Location: ../../pages/signin.php" . $error);
  exit();
}

$expiresIn = time() + (60 * 60 * 24); // 1 dia

$data = [
  'userId' => $result['userId'],
  'name' => $result['name']
];

setcookie("login", serialize($data), $expiresIn, '/');

header("Location: ../../pages/home.php");
exit();
