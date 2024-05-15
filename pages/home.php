
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php
        include_once '../components/head.php';
        echo head('ECIA Economy');
    ?>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <header>
        <div class="container content">
            <img src="../img/logo.svg" alt="Logo">
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
            </div>
        </div>
    </header>
</body>
</html>