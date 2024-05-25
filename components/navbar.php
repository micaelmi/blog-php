<?php
function navbar()
{
    return <<<HTML
  <header>
        <div class="container content">
            <div class="logo">
                <img src="../img/icon.svg" alt="Logo">
                ECIA Economy
            </div>
            <div class="links">
                <a href="signin.php">
                    <img src="../img/signin.svg" alt="Sign in">
                    <p>Sign in</p>
                </a>
                <a href="signup.php">
                    <img src="../img/signup.svg" alt="Sign up">
                    <p>Sign up</p>
                </a>
                <select name="language" id="language">
                    <option value="en">EN</option>
                    <option value="pt">PT</option>
                    <option value="es">ES</option>
                </select>

                <div class="menu-btn" onclick="toggleMenu()">
                    <div class="btn-line"></div>
                    <div class="btn-line"></div>
                    <div class="btn-line"></div>
                </div>
                
                <div class="menu">
                    <ul>
                    <button onclick="toggleMenu()">x</button>
                    <li><a href="/blog/pages/home.php">Home</a></li>
                    <li><a href="/blog/admin/my-articles.php">My articles</a></li>
                    <li><a href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
HTML;
}
