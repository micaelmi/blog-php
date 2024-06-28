<?php

$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
$languageAbbr = filter_input(INPUT_POST, 'lang', FILTER_SANITIZE_SPECIAL_CHARS);

$loginData = unserialize($_COOKIE['login']);
$userId = $loginData['userId'];

include_once '../db.php';

// Tratamento do upload de imagem
$picture = null;
if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
  $fileTmpPath = $_FILES['picture']['tmp_name'];
  $fileName = $_FILES['picture']['name'];
  $fileNameCmps = explode(".", $fileName);
  $fileExtension = strtolower(end($fileNameCmps));

  $uploadFileDir = '../../img/uploads/';
  $databasePath = '../img/uploads/';
  $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
  $dest_path = $uploadFileDir . $newFileName;

  if (!file_exists($uploadFileDir)) {
    mkdir($uploadFileDir, 0777, true);
  }

  if (move_uploaded_file($fileTmpPath, $dest_path)) {
    $picture = $databasePath . $newFileName;
  } else {
    echo "Error uploading the file.";
    exit();
  }
} elseif ($_FILES['picture']['error'] !== UPLOAD_ERR_NO_FILE) {
  echo "Error uploading the file.";
  exit();
}

$db = connection();

// Buscar id da linguagem
$sql = "SELECT languageId FROM language WHERE abbreviation = :abbreviation";
$stmt = $db->prepare($sql);
$stmt->bindParam(':abbreviation', $languageAbbr);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$result) {
  echo "Error finding language.";
  echo $languageAbbr;
  exit();
}

$languageId = $result['languageId'];

$sql = "
INSERT INTO article (pictureUrl, title, content, date, languageId, author) VALUES (:picture, :title, :content, NOW(), :language, :author);
";

$stmt = $db->prepare($sql);
$stmt->bindParam(':picture', $picture);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':language', $languageId);
$stmt->bindParam(':author', $userId);

if ($stmt->execute()) {
  $db = null;
  header("location:../../admin/my-articles.php");
} else {
  header("location:../../admin/create-article.php?error=error creating article");
}
