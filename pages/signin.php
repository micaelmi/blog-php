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
        <h1 id="title">sign in</h1>
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
          <label for="email" id="email_label">email</label>
          <input name="email" id="email" type="email" placeholder="enter your email address">

          <label for="password" id="password_label">password</label>
          <input name="password" id="password" type="password" placeholder="enter your password">
        </div>
        <div class="card-footer">
          <button type="submit" id="submit_button">login</button>
          <a href="signup.php" id="signup_link">isn't registered yet?</a>
        </div>
      </form>
    </div>
  </main>
</body>

</html>