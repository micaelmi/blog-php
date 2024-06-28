<?php
include_once '../components/head.php';
include_once '../components/navbar.php';
include_once '../components/back-button.php';
include_once '../functions/actions/get-articles-by-author.php';
// Verificar se o usuário está logado
if (!isset($_COOKIE['login'])) {
    header("Location: ../pages/signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?= head('Article | ECIA Economy'); ?>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/my-articles.css">
    <script defer src="../js/translation.js"></script>
</head>

<body>
    <?php echo navbar(); ?>

    <main class="container">
        <a href="/blog-php/pages/home.php">
            <img src="../img/back-arrow.svg" alt="Voltar">
        </a>
        <h1 id="title">My Articles</h1>

        <table>
            <thead>
                <tr>
                    <th id="tb-date">Date</th>
                    <th id="tb-title">Title</th>
                    <th id="tb-actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Iterar sobre os resultados da consulta
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . date('Y-m-d', strtotime($row['date'])) . "</td>"; // Formata a data conforme necessário
                    echo "<td>{$row['title']}</td>";
                    echo "<td class='actions'>";
                    echo "<a href='/blog-php/pages/article.php?id={$row['articleId']}'><img src='../img/view.svg' alt='view'></a>"; // Link para visualizar o artigo
                    echo "<a href='/blog-php/admin/edit-article.php?id={$row['articleId']}'><img src='../img/edit.svg' alt='edit'></a>";
                    echo "<a href='/blog-php/functions/actions/delete-article.php?id={$row['articleId']}'><img src='../img/delete.svg' alt='delete'></a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <a id="new" class="new-article" href="/blog-php/admin/create-article.php">
            Write New
        </a>
    </main>
</body>

</html>