<?php 
include "connect.php"; //выражение include вкл и выполняет указанный файл 
include "header.php"; 

$id_cat=isset($_GET['cat'])?$_GET['cat']: false;
$sort=isset($_GET["sort"])?$_GET["sort"]: false; 

$search=isset($_GET["search"])?$_GET["search"]: false;

$params ="";

$quary="select * from news";

$paginate_count=3;//n lim
$page=isset($_GET['page'])?$_GET['page']: 1;


if($sort)
{ 
  
    $quary = "SELECT *  FROM news  order by   $sort"; 
} 
 
if ($id_cat) 
{ 
    $params .="id_cat=$id_cat";
    $quary = "SELECT *  FROM news WHERE category_id  = $id_cat"; 
} 
if ($sort && $id_cat) 
{ 
    
    $quary = "SELECT *  FROM news WHERE category_id  = $id_cat order by   $sort"; 
} 
if($search)
{
    $quary = "SELECT * FROM news where title LIKE '%$search%'";
}
$offset=$page * $paginate_count-$paginate_count;

$count_news=mysqli_num_rows(mysqli_query($con, $quary));

$news = mysqli_query($con, $quary . " LIMIT $paginate_count OFFSET $offset"); 
// пагинаци



?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/style.css">    

    <title>Пингмяувины</title> 
</head> 
<body>     
<section class="sort">
        <h4>Сортировка по публикации</h4>
    <ul>
        <li>
<a href="/?sort=publish_date  ASC<?=($params!='')?'&'.$params:''?>"><img width="20px" src="images\icons\asc-sort.png" alt="asc"></a>
<a href="/?sort= publish_date DESC <?=($params!='')?'&'.$params:''?>"><img  width="20px" src="images\icons\desc-sort.png" alt="desc"></a>

    </li>
</ul>
    </section>
 
<main>

 
<hr>
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
    <nav aria-label="Page navigation example"  style="
    display: flex;
    justify-content: center;
">

  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
for($i=1; $i<=ceil($count_news/$paginate_count);$i++){?>
  <li class="page-item"><a class="page-link" href="?page=<?=$i?><?=$id_cat?'&cat=' .$id_cat:''?> <?=$sort?'&sort=' .$sort:''?> ">
      <?= $i ;?>
  </a></li>
<?php } ?>
    
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</main>
<script>

 </script>
</body> 
</html>