<?php

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

include_once '../db.php';

$db = connection();
$sql = "
INSERT INTO user (name, email, password, username) VALUES (:name, :email, :password, :username);
";

$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $hashed_password);
$stmt->bindParam(':username', $username);

if ($stmt->execute()) {
  $db = null;
  header("location:../../pages/signin.php");
} else {
  header("location:../../pages/signin.php?error=error creating user");
}
