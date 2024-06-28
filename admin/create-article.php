<?php
include_once '../components/head.php';
include_once '../components/navbar.php';
include_once '../functions/db.php';

if (!isset($_COOKIE['login'])) {
    header("Location: ../pages/signin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?= head('ECIA Economy | Post Article'); ?>
    <link rel="stylesheet" href="../css/create-article.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <script defer src="../js/translation.js"></script>
</head>

<body>
    <?php echo navbar() ?>
    <main class="container tamanho">
        <form action="../functions/actions/post-article.php" method="POST" enctype="multipart/form-data" id="uploadForm">
            <h1 id="create-title">Create article</h1>
            <div>
                <label id="cover-picture" class="labelTitle" for="labelPicture">Upload a cover picture</label>
                <label class="labelPicture" id="labelPicture" for="picture">--- Select your file ---</label>
                <input type="file" name="picture" id="picture" />
            </div>
            <div>
                <label id="article-title-label" class="labelTitle" for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="give a great title to your post" />
            </div>
            <div>
                <label id="content-label" class="labelTitle" for="content">Content</label>
                <textarea name="content" id="content" rows="30" placeholder="write your text here"></textarea>
            </div>
            <input type="hidden" name="lang" id="lang">
            <button id="sendArticle" name="sendArticle">Launch 🚀</button>
        </form>
        <div id="errorMessage" class="error-message" style="display: none;">Please select a cover picture.</div>
    </main>
</body>
<script>
    window.addEventListener("load", setLanguage);

    const input = document.getElementById("picture");

    input.addEventListener("change", function() {
        if(input.value) {
            document.getElementById("labelPicture").textContent = ((input.value).split("\\")).pop();
        } else {
            loadContent("create-article", localStorage.getItem('language'));
        }
    });

    function setLanguage() {
        var localLanguage = localStorage.getItem('language');
        document.getElementById('lang').value = localLanguage;
    }
    window.addEventListener("load", setLanguage);
</script>

</html>