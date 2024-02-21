<?php 
include "connect.php"; //выражение include вкл и выполняет указанный файл 

 

$id_cat=isset($_GET['cat'])?$_GET['cat']: false;
$sort=isset($_GET["sort"])?$_GET["sort"]: false; 
$sort=isset($_GET["sort"])?$_GET["sort"]: false; 
$search=isset($_GET["search"])?$_GET["search"]: false;

$params ="";

$quary="select * from news";

if($sort)
{ 
    
    // $params .="sort=$sort";
    $quary = "SELECT *  FROM news  order by   $sort"; 
} 
 
if ($id_cat) 
{ 
    $params .="id_cat=$id_cat";
    $quary = "SELECT *  FROM news WHERE category_id  = $id_cat"; 
} 
if ($id_cat && $sort) 
{ 
    
    $quary = "SELECT *  FROM news WHERE category_id  = $id_cat order by   $sort"; 
} 
if($search)
{
    $quary = "SELECT * FROM news where title LIKE '%$search%'";
}
$news = mysqli_query($con, $quary); 

include "header.php"; 
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Пингмяувины</title> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik+Burned&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="style.css">
<!-- ссылки -->

</head> 
<body> 
<h1>    
<a href="#">
    Пингмяувины
</a>
</h1>
 
<section class="sort">
        <h4>Сортировка по публикации</h4>
    <ul>
        <li>
<a href="/?sort= publish_date ASC<?=($params!='')?'&'.$params:''?>"><img width="20px" src="images\icons\asc-sort.png" alt="asc"></a>
<a href="/?sort= publish_date DESC <?=($params!='')?'&'.$params:''?>"><img  width="20px" src="images\icons\desc-sort.png" alt="desc"></a>

    </li>
</ul>
    </section>
 
<main>

 
<hr>
<!--     
       <div id="searchResults"></div> -->
<section class="last-news">
      <div class="container">
      <?php
        if(mysqli_num_rows($news)==0){
            echo "Нет новостей";
        }

        while  ($new = mysqli_fetch_assoc($news))
        {

            echo "<div class = 'card'>";

            $new_id = $new['news_id'];

            echo "<img  src='images/news/".$new['image']."' id='img'>";
            echo "<a href='oneNew.php?new=$new_id'>".$new['title']."</a>";
            echo "<p>Дата публикации " . $new['publish_date'] . "</p>";
            echo "</div>";

        }

        ?>
        </div>
    </section>
</main>
<script>
// $("#searchForm").on('keyup', function(e){
//     if(e.key ==='Enter'){
//         <?php
//         $search = isset($_GET['search']) ? $_GET['search']: false;
// ?>
//     }
// });
 </script>
</body> 
</html>