<?php
include "connect.php"; 
// $query_category = "SELECT * from categories ";
// $categories = mysqli_fetch_all(mysqli_query($con, $query_category));
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
</head>
<body>
    <!-- <div class="header">
        <div class="header-div1">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M19 17H1V15H19V17ZM13 11H1V9H13V11ZM1 5V3H19V5H1Z" fill="#BCBFC2"/>
        </svg>
            <p>Разделы</p>
        </div>
        <hr class="hr1">
        <div class="header-div2">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.4354 17.3951L14.146 12.9395C15.2489 11.6301 15.8532 9.98262 15.8532 8.26749C15.8532 4.26026 12.5888 1 8.57659 1C4.56433 1 1.29999 4.26026 1.29999 8.26749C1.29999 12.2747 4.56433 15.535 8.57659 15.535C10.0828 15.535 11.5182 15.0812 12.7454 14.2199L17.0674 18.7093C17.2481 18.8967 17.4911 19 17.7514 19C17.9979 19 18.2317 18.9062 18.4092 18.7355C18.7863 18.3731 18.7983 17.7721 18.4354 17.3951ZM8.57659 2.89587C11.5423 2.89587 13.9549 5.30552 13.9549 8.26749C13.9549 11.2295 11.5423 13.6391 8.57659 13.6391C5.6109 13.6391 3.19823 11.2295 3.19823 8.26749C3.19823 5.30552 5.6109 2.89587 8.57659 2.89587Z" fill="#BCBFC2"/>
        </svg>
            <label for="">
                <input type="search" name="" id="" placeholder="Поиск">
            </label>
        </div>
        <div class="header-div3">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18 16.6316C16.3675 18.2105 13.7008 19 10 19C6.29917 19 3.63251 18.2105 2 16.6316C2 13.3481 3.90591 10.9832 6.70588 10C7.60059 10.4169 8.59455 11 10 11C11.4054 11 12.3311 10.3926 13.2941 10C16.0575 10.9965 18 13.3748 18 16.6316ZM10 9C7.79086 9 6 7.20914 6 5C6 2.79086 7.79086 1 10 1C12.2091 1 14 2.79086 14 5C14 7.20914 12.2091 9 10 9Z" fill="#BCBFC2"/>
                </svg>
            <a href="">Войти</a>
        </div>
    </div>
    <hr class="hr2">
    <div class="logo-date">
        <div>
            <h1>Пингмяувины</h1>
        </div>
        <div class="date-weather">
            <p>Monday, January 1, 2018</p>
            <div class="weather">
                <img src="Image/Sun.png" alt="">
                <p>- 23 °C</p>
            </div>
        </div>
    </div>
    <div class="section">
        <?php
 foreach($categories as $category){ 
    echo "<li><a href='#'>$category[1]</a></li>"; 
     
    } 
     
        ?>
    </div> -->
    <h2>Добавить пост</h2>
    <main>
 
        <form action="createNewValid.php" method="POST" enctype="multipart/form-data">
            <label for="userTitle">Напишите заголовок</label>
            <br>
            <input type="text" id="userTitle" name="userTitle">
            <br>
    
            <label for="userImages">Загрузите изображение</label>
            <br>
            <input type="file" id="userImages" name="userImages" accept="image/*">
            <br>
            
            <label for="userContent">Напишите текст</label>

            <br>

            <input type="text" id="userContent" name="userContent">

            <br>

            <label for="userCategory">Выберите категорию:</label>
            <br>

            <select id="userCategory" name="userCategory" >
            <?php 
            foreach($categories as $category)  {
                $id_cat = $category[0];
                $name = $category[1];
            echo "<option value ='$id_cat'>$name</option>";
}
?>
            </select>
            <br>
            <input type="submit" value="Отправить">


        </form> 
    </main>
</body>
</html>