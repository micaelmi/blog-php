<?php
include_once '../components/head.php';
include_once '../components/navbar.php';
include_once '../functions/db.php';
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

$pictureUrlArray = explode("/", htmlspecialchars($article['pictureUrl']));
$fileLabelText = end($pictureUrlArray);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?= head('ECIA Economy | Edit Article'); ?>
    <link rel="stylesheet" href="../css/create-article.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <script defer src="../js/translation.js"></script>
</head>

<body>
    <?php echo navbar() ?>
    <main class="container tamanho">
        <form action="../functions/actions/put-article.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <a href="/blog-php/pages/home.php">
                <img src="../img/back-arrow.svg" alt="Voltar">
            </a>
            <h1 id="create-title">Edit your article</h1>
            <div>
                <label id="cover-picture" class="labelTitle" for="labelPicture">Upload a cover picture</label>
                <label class="labelPicture" id="labelPicture" for="picture"><?php echo $fileLabelText; ?></label>
                <input type="file" name="picture" id="picture" />
            </div>
            <div>
                <label id="article-title-label" class="labelTitle" for="title">Title</label>
                <input value="<?php echo $article["title"]; ?>" type="text" name="title" id="title" placeholder="give a great title to your post" />
            </div>
            <div>
                <label id="content-label" class="labelTitle" for="content">Content</label>
                <textarea name="content" id="content" rows="30" placeholder="write your text here"><?php echo $article["content"]; ?></textarea>
            </div>
            <input type="hidden" name="lang" id="lang">
            <button id="sendArticle" name="sendArticle">Edit ✍</button>
        </form>
    </main>
</body>
<script>
    window.addEventListener("load", setLanguage);

    const language = document.getElementById("language");
    language.addEventListener("change", function() {
        document.getElementById('lang').value = language.value;
    })

    const input = document.getElementById("picture");

    input.addEventListener("change", function() {
        if (input.value) {
            document.getElementById("labelPicture").textContent = ((input.value).split("\\")).pop();
        } else {
            loadContent("create-article", document.getElementById('language'));
        }
    });

    function setLanguage() {
        var localLanguage = localStorage.getItem('language');
        document.getElementById('lang').value = localLanguage;
    }
</script>

</html>