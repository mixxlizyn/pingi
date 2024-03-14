<?php 
include "../connect.php"; //выражение include вкл и выполняет указанный файл 
$news = mysqli_fetch_all(mysqli_query($con, "select * from news "));
 
 include "header.php";
 $id_new = isset($_GET["new"]) ? $_GET["new"]:false;
 if($id_new) $new_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM news where news_id=$id_new"));
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Пингмяувины</title> 
    <link rel="stylesheet" href="admin.css">
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
     
<h3>Админ</h3>
<main>
   

    <div class="container">
      <div class="content">
        <section class="col_1">
            <h4>Список новостей</h4>
        <?php
      foreach ($news as $new){
        echo "<li><a href='?new=" .$new[0] ."'>".$new[2]."</a>
        <a href='deleteNew.php?new=$new[0]'><img src='../images\icons\free-icon-delete-8110689.png'></a>
        </li><hr>";
  
      }
        ?>
<a href="/admin">
<img src="../images\icons\free-icon-plus-5553479.png" >
</a>
        </section>


        <section class="col_2">
            <h2><?=$id_new?"Редактирование новости № $id_new":"создание новости";  ?></h2>
        <form class="newsadd" action='<?=$id_new?"update":"create"; ?>NewValid.php' method="POST" enctype="multipart/form-data">
        <?= $id_new?"<div class='post_img' style='background-image:url(/images/news/" . $new_info['image'] . ")'></div>" : "";?>
        <?= $id_new?"<input type='hidden' name='id' value='$id_new'>":"" ;?>
        <label for="userTitle">Напишите заголовок</label>
            <br>
            <input type="text" id="userTitle" name="userTitle" value='<?= $id_new?$new_info["title"]:""?>'>
            <br>
    
            <label for="userImages">Загрузите изображение</label>
            <br>
            <input type="file" id="userImages" name="userImages" accept="image/*">
            <br>
            
            <label for="userContent">Напишите текст</label>

            <br>

            <input type="text" id="userContent" name="userContent" value='<?= $id_new?$new_info["content"]:""?>'>

            <br>

            <label for="userCategory">Выберите категорию:</label>
            <br>

            <select id="userCategory" name="userCategory" selected='<?= $id_new?$new_info["name"]:""?>' >
            <?php 
            foreach($categories as $category)  {
                $id_cat = $category[0];
                $name = $category[1];
                $is_sel = ($id_cat==$new_info['category_id'])?"selected":'';
                                    echo "<option value='$id_cat'". ($id_new?$is_sel:'') .">$name</option>";
            
}
?>
            </select>
            <br>
            <input type="submit" value="Отправить">
            <?php
            echo "<a href='deleteNew.php?new=$id_new'>". "<img id='trashimg' src='/images/trash.png' alt='Удалить'>" . "</a>" . "<br>";?>


        </form> 
        </section>
     
        </div>
        <div>

        </div>
    </div>
</main>
 
</body> 
</html>