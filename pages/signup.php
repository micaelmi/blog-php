<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  include_once '../components/head.php';
  echo head('ECIA Economy | Sign In');
  ?>
  <link rel="stylesheet" href="../css/signin.css">
  <script defer src="../js/translation.js"></script>
</head>

<body>
  <header>
    <img src="../img/icon.svg" alt="Logo">
    ECIA Economy
  </header>
  <main>
    <div class="card">
      <div class="card-header">
        <h1 id="title">sign up</h1>
        <div class="options">
          <select name="language" id="language">
            <option value="en">EN</option>
            <option value="pt">PT</option>
            <option value="es">ES</option>
          </select>
          <a href="home.php" id="home_link">home</a>
        </div>
      </div>
      <form action="">
        <div class="card-content">
          <label for="name" id="name_label">name</label>
          <input name="name" id="name" type="text" placeholder="enter your full name">

          <label for="username" id="username_label">username</label>
          <input name="username" id="username" type="text" placeholder="create a unique username">

          <label for="email" id="email_label">email</label>
          <input name="email" id="email" type="email" placeholder="enter your email address">

          <label for="password" id="password_label">password</label>
          <input name="password" id="password" type="password" placeholder="enter your password">
        </div>
        <div class="card-footer">
          <button type="submit" id="submit_button">create account</button>
          <a href="signin.php" id="signin_link">already have an account?</a>
        </div>
      </form>
    </div>
  </main>
</body>

</html>