<?php
include "connect.php";
include "header.php";
$username = isset($_SESSION["user_id"]) ?  mysqli_fetch_assoc(mysqli_query($con, 'select login from users where user_id=' .$_SESSION["user_id"]))["login"] : false;
$userEmail = isset($_SESSION["user_id"]) ?  mysqli_fetch_assoc(mysqli_query($con, 'select login from users where user_id=' .$_SESSION["user_id"]))["login"] : false;


// $userEmail = $_POST["email"];

// $userLogin = $_POST["login"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <h1>Приветули, <?=$username?>!</h1>
  <a href="exit.php">Что бы выйти нажмите по ссылке.</a>
  
</body>
</html> 