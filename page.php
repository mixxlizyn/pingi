<?php
include "connect.php";
include "header.php";
$login = $_COOKIE['user'];
// var_dump ($login)
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Привет! <?=$login?></h1>
	<a href="exit.php">Что бы выйти нажмите по ссылке.</a>
</body>
</html>