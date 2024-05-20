<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  include_once '../components/head.php';
  echo head('ECIA Economy | Sign In');
  ?>
  <link rel="stylesheet" href="../css/signin.css">
</head>

<body>
  <header>
    <img src="../img/icon.svg" alt="Logo">
    ECIA Economy
  </header>
  <main>
    <div class="card">
      <div class="card-header">
        <h1>sign up</h1>
        <select name="language" id="language">
          <option value="en">EN</option>
          <option value="pt">PT</option>
          <option value="es">ES</option>
        </select>
      </div>
      <form action="">
        <div class="card-content">
          <label for="name">name</label>
          <input name="name" id="name" type="text" placeholder="enter your full name">

          <label for="username">username</label>
          <input name="username" id="username" type="text" placeholder="create a unique username">

          <label for="email">email</label>
          <input name="email" id="email" type="email" placeholder="enter your email address">

          <label for="password">password</label>
          <input name="password" id="password" type="password" placeholder="enter your password">
        </div>
        <div class="card-footer">
          <button type="submit">create account</button>
          <a href="signin.php">already have an account?</a>
        </div>
      </form>
    </div>
  </main>
</body>

</html>