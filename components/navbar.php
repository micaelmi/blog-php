<?php
function navbar()
{
    $isLoggedIn = isset($_COOKIE['login']);

    $loginLinks = !$isLoggedIn ? <<<HTML
    <div class="loginlinks">
        <a href="/blog-php/pages/signin.php">
            <img src="../img/signin.svg" alt="Sign in">
            <p id="signin">Sign in</p>
        </a>
        <a href="/blog-php/pages/signup.php">
            <img src="../img/signup.svg" alt="Sign up">
            <p id="signup">Sign up</p>
        </a>
    </div>
HTML : '';

    $menu = $isLoggedIn ? <<<HTML
    <div class="menu-btn" onclick="toggleMenu()">
                    <div class="btn-line"></div>
                    <div class="btn-line"></div>
                    <div class="btn-line"></div>
                </div>
    <div class="menu">
        <ul>
            <button onclick="toggleMenu()">x</button>
            <li><a id="home" href="/blog-php/pages/home.php">Home</a></li>
            <li><a id="my-articles" href="/blog-php/admin/my-articles.php">My articles</a></li>
            <li><a id="logout" href="/blog-php/pages/logout.php">Logout</a></li>
        </ul>
    </div>
HTML : '';

    return <<<HTML
    <header>
        <div class="container content">
            <a href="/blog-php/pages/home.php">
                <div class="onlylogo">
                    <img src="../img/icon.svg" alt="Logo">
                </div>
                <div class="logo">
                    <img src="../img/icon.svg" alt="Logo">
                    ECIA Economy
                </div>
            </a>
            <div class="links">
                $loginLinks
                <select name="language" id="language">
                    <option value="en">EN</option>
                    <option value="pt">PT</option>
                    <option value="es">ES</option>
                </select>
                $menu
            </div>
        </div>
    </header>
HTML;
}
