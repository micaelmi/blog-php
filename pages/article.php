<?php
include_once '../components/head.php';
include_once '../components/navbar.php';
include_once '../components/back-button.php';
include_once '../components/comment.php';
include_once '../functions/actions/get-article-by-id.php';

if (!isset($_COOKIE['login'])) {
  header("Location: ../pages/signin.php");
  exit();
}

// Recuperar o ID do artigo da URL
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// Verificar se o ID é válido
if (!$id) {
  die("Invalid article ID.");
}

// Obter o artigo do banco de dados
$article = getArticleById($id);

if (!$article) {
  die("Article not found.");
}

$commentAction = "../functions/actions/post-comment.php?id={$id}"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php echo head('Article | ECIA Economy'); ?>
  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="../css/article.css">
  <script defer src="../js/translation.js"></script>
</head>

<body>
  <?php echo navbar() ?>
  <article>
    <a href="/blog-php/pages/home.php">
      <img src="../img/back-arrow.svg" alt="Voltar">
    </a>
    <img class="cover" src="<?php echo htmlspecialchars($article['pictureUrl']); ?>" alt="cover image">
    <h1><?php echo htmlspecialchars($article['title']); ?></h1>
    <h4><?php echo htmlspecialchars($article['date']); ?> <span id="by">By</span> <?php echo htmlspecialchars($article['authorName']); ?></h4>
    <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>

    <h2 id="comments">Comments</h2>
    <form method="POST" action=<?= $commentAction ?>>
      <input type="text" id="comments_placeholder" name="comment" placeholder="comment here...">
      <button type="submit" title="Send">
        <img src="../img/send.svg" alt="Send">
      </button>
    </form>
    <div class="comments">
      <?php
      foreach ($article['comments'] as $comment) {
        echo comment(htmlspecialchars($comment['authorName']), htmlspecialchars($comment['date']), htmlspecialchars($comment['text']));
      }
      ?>
    </div>
  </article>
</body>

</html>