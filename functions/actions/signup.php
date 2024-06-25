<?php

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

include_once '../db.php';

$db = connection();
$sql = "
INSERT INTO user (userId, name, email, password, username) VALUES (NULL, $name, $email, $hashed_password, $username);
";
try {
  $db->beginTransaction();
  $linhas = $db->exec($sql);
  if ($linhas == 1) {
    $db->commit();
  } else {
    $db->rollBack();
  }
} catch (Exception $ex) {
  $params = "";
  $params = "erro=user already exists";

  $params .= "&name=$name";
  $params .= "&username=$username";
  $params .= "&email=$email";

  $db = null;
  header("location:../../pages/signup.php?$params");
  die();
}


$db = null;

header("location:../../pages/signin.php");
