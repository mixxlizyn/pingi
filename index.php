<?php 
include "connect.php"; //выражение include вкл и выполняет указанный файл 
 
$query_get_category = "select * from categories "; 
 
$categories = mysqli_fetch_all(mysqli_query($con, $query_get_category)); 

 
//получаем результат запроса из переменной query_get_category  
//и пользуем его в двумерный массив,где каждый элемент  
//это массив с построчным получением кортеж5ей из таблицы результата запроса 
 
// print_r($categories); 
 $news = mysqli_query($con, "select * from news ");
 
include "header.php"; 
 

$id_cat=isset($_GET['category_id '])?$_GET['category_id ']: false;
$quary_cat="";

if ($id_cat) { 
    var_dump($id_cat);
    // $query_cat = "SELECT *  FROM news WHERE category_id  = $id_cat"; 
} else { 
    $query_cat = "select * from news"; 
} 
 
$result = mysqli_query($con,$quary_cat );  

?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Пингмяувины</title> 
    <link rel="stylesheet" href="css\style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik+Burned&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
</head> 
<body> 
     

 

 
<main>
<section class="last-news">
      <div class="container">
      <?php

        while  ($new = mysqli_fetch_assoc($news))
        {

       echo "<div class = 'card'>";

       $new_id = $new['news_id'];

       echo "<img  src='images/news/".$new['image']."' id='img'>";
    //    echo "<h2 class = 'c_title'>" . $new['title'] . "</h2>";
    echo "<a href='oneNew.php?new=$new_id'>".$new['title']."</a>";
    //    echo "<p>" . $new['ca'] . "</p>";

       echo "<p>Дата публикации " . $new['publish_date'] . "</p>";
       echo "</div>";

        }

        ?>
        </div>
    </section>
</main>
 
</body> 
</html>