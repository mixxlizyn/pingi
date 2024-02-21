<?php
include "connect.php"; 
$login = strip_tags(trim($_POST['login']));
$pass = strip_tags(trim($_POST['password']));
$query = "SELECT * FROM Users WHERE login = '$login' and password = '$pass'";
$result1 = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result1);

if(count($user) == 0){
	echo "Такой пользователь не найден.";
	exit();
}
else if(count($user) == 1){
	echo "Логин или праоль введены неверно";
	exit();
}

setcookie('user', $user['login'], time() + 3600, "/");

header('Location:page.php');

