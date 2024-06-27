<?php
function articleCard($url, $imagem, $title, $date, $lang, $author)
{
    return <<<HTML
        <a href="$url">
        <div class="articleCard">
            <img class='articleImage' src={$imagem} alt="card image">
            <div class="articleContent">
                <h2>{$title}</h2>
                <p>{$date}</p>
                <p>{$lang} | {$author}</p>
            </div>
        </div>
        </a>
    HTML;
}
