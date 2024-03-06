<?php
include "connect.php";
include "header.php";
$user = $_COOKIE['user'];


$userEmail = $_POST["email"];

$userLogin = $_POST["login"];
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