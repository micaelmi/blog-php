<?php
include_once '../components/head.php';
include_once '../components/navbar.php';
include_once '../components/back-button.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo head('Article | ECIA Economy'); ?>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/my-articles.css">
</head>

<body>
    <?php echo navbar() ?>
    <main class="container">
        <?php echo backButton(); ?>
        <h1>My Articles</h1>
        <table>
            <thead>
                <tr>
                    <th>date</th>
                    <th>title</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2024-05-01</td>
                    <td>How can I reach $100,000 earning a low salary</td>
                    <td class="actions">
                        <a href="#"><img src="../img/view.svg" alt="view"></a>
                        <a href="#"><img src="../img/edit.svg" alt="edit"></a>
                        <a href="#"><img src="../img/delete.svg" alt="delete"></a>
                    </td>
                </tr>
                <tr>
                    <td>2024-05-01</td>
                    <td>How can I reach $100,000 earning a low salary</td>
                    <td class="actions">
                        <a href="#"><img src="../img/view.svg" alt="view"></a>
                        <a href="#"><img src="../img/edit.svg" alt="edit"></a>
                        <a href="#"><img src="../img/delete.svg" alt="delete"></a>
                    </td>
                </tr>
                <tr>
                    <td>2024-05-01</td>
                    <td>How can I reach $100,000 earning a low salary</td>
                    <td class="actions">
                        <a href="#"><img src="../img/view.svg" alt="view"></a>
                        <a href="#"><img src="../img/edit.svg" alt="edit"></a>
                        <a href="#"><img src="../img/delete.svg" alt="delete"></a>
                    </td>
                </tr>
                <tr>
                    <td>2024-05-01</td>
                    <td>How can I reach $100,000 earning a low salary</td>
                    <td class="actions">
                        <a href="#"><img src="../img/view.svg" alt="view"></a>
                        <a href="#"><img src="../img/edit.svg" alt="edit"></a>
                        <a href="#"><img src="../img/delete.svg" alt="delete"></a>
                    </td>
                </tr>
            </tbody>
        </table>

        <a class="new-article" href="#">
            write new
        </a>
        </article>
</body>

</html>