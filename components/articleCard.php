<?php
function articleCard($imagem, $title, $date)
{
    return <<<HTML
        <a href="/blog-php/pages/article.php">
        <div class="articleCard">
            <img src={$imagem} alt="card image">
            <div class="cardInfo">
                <i>{$title}</i>
                <small>{$date}</small>
            </div>
        </div>
        </a>
    HTML;
}
