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
            <?= articleCard('../img/card-example.svg', 'Learn the top 5 secure investiments of May', '2024-06-04'); ?>
            <?= articleCard('../img/card-example2.svg', 'How can I reach $100,000 earning a low salary', '2024-05-21'); ?>
            <?= articleCard('../img/card-example3.svg', 'Young man succeeded brilliantly.', '2024-05-09'); ?>
        </div>
    </main>
</body>

</html>