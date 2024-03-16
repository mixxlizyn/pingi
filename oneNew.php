<?php
session_start();
include "connect.php"; 
$new_id = isset($_GET["new"]) ? $_GET["new"]:false;
if($new_id){


$query_getNew = "SELECT news.*, categories.name FROM news INNER JOIN categories on news.category_id = categories.category_id where news_id = $new_id";
$new_info = mysqli_fetch_assoc(mysqli_query($con, $query_getNew));

// var_dump($date);
$month = ["01"=>"Января",
 "02"=>"Февраля",
 "03"=>"Марта",
  "04"=>"Апреля",
   "05"=>"Мая",
    "06"=>"Июня", "07"=>"Июля", "08"=>"Августа", "09"=>"Сентября", 
"10"=>"Октября","11"=>"Ноября", "12"=>"Декабря"];
function date_new ($date_old){
    global $month;
    $date = date ( "d.m.Y H:i:s", strtotime($date_old));
    return substr($date,0,2) . " " . $month[substr($date, 3,2)] ." " . substr($date,6);
}


$publish_date = date_new($new_info['publish_date']);
// var_dump($m_text);
$comments_result= mysqli_query($con, "SELECT comment_text, comment_date, login FROM Comments INNER JOIN Users on Comments.user_id=Users.user_id where news_id = $new_id");
$comments=mysqli_fetch_all($comments_result);
// var_dump($comments);
}
else {
    header("Location: /");
}
include "header.php"; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\oneNew.css">

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
        <?php 
if($username){?>
<form action="comment-db.php" method="POST" class="w-100">
    <div class="mb-3 w-50">
    <input type="hidden" name="new" value="<?=$new_id?>">
        <label for="comment_text" class="form-label">Напиите комментарий</label>
        <input type="text" class="form-control" id="comment_text" name="comment_text">
    </div>
    <button type="submit" class="btn btn-primary mb-3">Отправить</button>
</form>
<?php } ?>
         <div class="comment">
        <h3 class="mb-3"><img src="images\icons\comment40.png" alt="comment">Комментарии | <?=mysqli_num_rows($comments_result)?>  </h3>
        <?php if (mysqli_num_rows($comments_result)){
            foreach ($comments as $comment){?>
            <?= "<b>$comment[2] </b>"." пишет:"?>
            <br>
<?=$comment[0];?>
<br>
<?= date_new($comment[1]);?> <br>
<hr width=100px>
<?php
            }
        } else echo "<i>Комментариев пока нет</i>";
        ?>
        </div>
        </div>
    </section>
</body>
</html>