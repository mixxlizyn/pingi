<?php
include "connect.php"; 
$new_id = isset($_GET["new"]) ? $_GET["new"]:false;
$query_getNew = "SELECT news.*, categories.name FROM news INNER JOIN categories on news.category_id = categories.category_id where news_id = $new_id";
$new_info = mysqli_fetch_assoc(mysqli_query($con, $query_getNew));
$date = date("d.m.Y H:i", strtotime($new_info['publish_date']));
// var_dump($date);
$month = ["01"=>"Января",
 "02"=>"Февраля",
 "03"=>"Марта",
  "04"=>"Апреля",
   "05"=>"Мая",
    "06"=>"Июня", "07"=>"Июля", "08"=>"Августа", "09"=>"Сентября", 
"10"=>"Октября","11"=>"Ноября", "12"=>"Декабря"];
$m_text=$month[substr($date,3,2)];

$publish_date = substr($date,0,2)." ".$m_text." ". substr($date,6);
// var_dump($m_text);


include "header.php"; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">

    <title>Document</title>
</head>
<body>
<div class="container">
      <?php

        

       echo "<div class = 'card'>";

       

       echo "<img  src='images/news/".$new_info['image']."' id='img'>";
       echo "<h2 class = 'c_title'>" . $new_info['title'] . "</h2>";
       echo "<p>" . $new_info['content'] . "</p>";
       echo "<p>Категория:<b>". $new_info['name']. "</b></p>";
       echo "<p>Дата публикации " . $publish_date . "</p>";


       echo "</div>";
        ?>
        </div>
    </section>
</body>
</html>