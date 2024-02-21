<?php
include "connect.php";
include "header.php";
$user = $_COOKIE['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <h1>Добро пожаловать, <?= $user ?>!</h1>
  <a href="exit.php">Что бы выйти нажмите по ссылке.</a>
</body>
</html> 