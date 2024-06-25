<?php
setcookie('login', '', time() - 3600, '/');
header("location: ../../pages/signin.php");
