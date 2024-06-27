<?php
include_once '../db.php';

// Verificar se o 'id' foi passado como parâmetro na URL
if (isset($_GET['id'])) {
  $articleId = intval($_GET['id']);

  // Conectar ao banco de dados
  $db = connection();

  try {
    // Deletar o artigo
    $sql = "DELETE FROM article WHERE articleId = :articleId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':articleId', $articleId, PDO::PARAM_INT);

    if ($stmt->execute()) {
      // Fechar a conexão com o banco de dados
      $db = null;

      // Redirecionar para a página de artigos do usuário com uma mensagem de sucesso
      header("location:../../admin/my-articles.php?message=Article deleted successfully");
      exit();
    } else {
      // Se a execução falhar, redirecionar com uma mensagem de erro
      header("location:../../admin/my-articles.php?error=Error deleting article");
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
