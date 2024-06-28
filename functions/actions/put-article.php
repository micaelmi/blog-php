<?php
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
$languageAbbr = filter_input(INPUT_POST, 'lang', FILTER_SANITIZE_SPECIAL_CHARS);

include_once '../db.php';

// Verificar se o 'id' foi passado como parâmetro na URL
if (isset($_GET['id'])) {

  $id = intval($_GET['id']);

  if (isset($_FILES['picture'])) {
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
  }

  $articleId = intval($_GET['id']);

  // Conectar ao banco de dados
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

  try {
    // SQL para edição do artigo
    if (isset($_FILES['picture'])) {
      $sql = "UPDATE article
      SET pictureUrl = :picture, title = :title, content = :content, languageId = :languageId
      WHERE articleId = :id";

      $stmt = $db->prepare($sql);
      $stmt->bindParam(':picture', $picture);
    } else {
      $sql = "UPDATE article
      SET title = :title, content = :content, languageId = :languageId
      WHERE articleId = :id";

      $stmt = $db->prepare($sql);
    }
    
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':languageId', $languageId);

    if ($stmt->execute()) {
      // Fechar a conexão com o banco de dados
      $db = null;

      // Redirecionar para a página de artigos do usuário com uma mensagem de sucesso
      header("location:../../admin/my-articles.php?message=Article edited successfully");
    } else {
      // Se a execução falhar, redirecionar com uma mensagem de erro
      header("location:../../admin/my-articles.php?error=Error editing article");
      exit();
    }
  } catch (PDOException $e) {
    // Em caso de exceção, redirecionar com a mensagem de erro
    header("location:../../admin/my-articles.php?error=" . $e->getMessage());
    exit();
  }
} else {
  // Se 'id' não foi passado, redirecionar com uma mensagem de erro
  header("location:../../admin/my-articles.php?error=Invalid article ID");
  exit();
}