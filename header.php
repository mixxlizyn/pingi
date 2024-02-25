<?php
include "connect.php"; 
$query_category = "SELECT * from categories ";
$categories = mysqli_fetch_all(mysqli_query($con, $query_category));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="n_nav">
<div class="header">
        <div class="header-div1">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M19 17H1V15H19V17ZM13 11H1V9H13V11ZM1 5V3H19V5H1Z" fill="#BCBFC2"/>
        </svg>
            <p>Разделы</p>
        </div>
        <hr class="hr1">
        <form class="header-div2" method="GET" id="searchForm">
            <img src="Image/Search.png" alt="">
         
                <input type="search" name="search" id="searchInput" placeholder="Поиск">
              
            
        </form>
        <div class="header-div3">
            <img src="Image/Man.png" alt="">
            <a href="auth.php">Войти</a>
            <a href="auth.php">Регистрация</a>

        </div>
      
    </div>
    <hr class="hr2">
    <div class="logo-date">
        <div>
            <h1><a href="index.php">Пингмяувины</a></h1>
        </div>
        <div class="date-weather">
            <p>Monday, January 1, 2018</p>
            <div class="weather">
                <p>- 23 °C</p>
            </div>
        </div>
    </div>
    <div class="section">
    <?php  
 
 foreach($categories as $category){ 
 echo "<li><a href='/?cat=$category[0]'>$category[1]</a></li>"; 
  
 } 
  
 ?> 
    </div> 
 

 
 
</div> 
</body>
</html>