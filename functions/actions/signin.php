<?php

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);

include_once '../db.php';

$bd = connection();
$sql = "SELECT userId FROM user WHERE email = '$email' AND password = '$password'";
$command = $bd->query($sql);
$result = $command->fetch(PDO::FETCH_ASSOC);

if (!$result) {
  $error = "?email=" . $email . "&error=Incorrect credentials";
  header("location: ../../pages/signin.php" . $error);
  exit();
}

$expiresIn = time() + (60 * 60 * 24); // 1 dia

$data[0] = $email;
$data[1] = $senha;

setcookie("login", serialize($data), $expiresIn, '/');

header("location:../../pages/home.php");
exit();
