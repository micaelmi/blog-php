<?php
function head($title)
{
  return <<<HTML
  <meta charset="utf-8" />
  <meta http-equiv="content-language" content="pt-br" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" type="image/x-icon" href="../img/icon.svg" />
  <title>$title</title>

  <meta name="author" content="Deivid Zanotti, Micael Inácio, Mayara Ribeiro">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&family=Klee+One:wght@400;600&family=Jua&display=swap" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="../css/global.css">
  <!-- JS -->
  <script defer src="../js/global.js"></script>
HTML;
}
