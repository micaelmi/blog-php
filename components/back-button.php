<?php
function backButton()
{
  return <<<HTML
  <button onclick="goBack()" class="back-button">
    <img src="../img/back-arrow.svg" alt="Voltar">
  </button>
HTML;
}