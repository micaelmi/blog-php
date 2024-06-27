<?php
include_once '../components/head.php';
include_once '../components/articleCard.php';
include_once '../components/navbar.php';
include_once '../functions/actions/get-articles.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?= head('ECIA Economy'); ?>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/home.css">
    <script defer src="../js/translation.js"></script>
</head>

<body>
    <?php echo navbar() ?>
    <main class="container">
        <div class="title">
            <img src="../img/article.svg" alt="article">
            <h1 id="title">Latest articles</h1>
        </div>
        <div class="articlesList">
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo articleCard("article.php?id={$row['articleId']}", $row['pictureUrl'], $row['title'], $row['date'], $row['lang'], $row['authorName']);
            }
            ?>
        </div>
    </main>
</body>

</html>