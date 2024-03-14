<?php
include "connect.php";
session_start();

$comment = isset($_POST["comment_text"])?$_POST["comment_text"]:false;

$new_id = isset($_POST["new"])?$_POST["new"]:false;

$user_id = $_SESSION['user_id'];

if($comment && $new_id) {
    $query = "INSERT INTO comments (`news_id`, `user_id`, `comment_text`) VALUES ($new_id, $user_id, '$comment')";
    if(mysqli_query($con, $query)) header("Location: /oneNew.php?new=$new_id");
    else echo "ошибка"; 
}