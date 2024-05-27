<?php
function articleCard($title, $date) {
    return <<<HTML
        <div class="articleCard">
            <img src="../img/cardExample.svg" alt="card image">
            <div class="cardInfo">
                <i>{$title}</i>
                <small>{$date}</small>
            </div>
        </div>
    HTML;
}