<?php
include_once '../components/head.php';
include_once '../components/articleCard.php';
include_once '../components/navbar.php';
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
            <?=articleCard('Testando card', '20/05/2024'); ?>
            <?=articleCard('Testando card', '20/05/2024'); ?>
            <?=articleCard('Testando card', '20/05/2024'); ?>
        </div>
    </main>
</body>

</html>