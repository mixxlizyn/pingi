<?php
include "connect.php"; 

$userTitle = $_POST["userTitle"];
$userContent = $_POST["userContent"];
$userImages = $_FILES["userImages"]["name"];


$sql = "INSERT INTO `News`( `image`, `title`, `content`, `category_id`) VALUES ( '$userImages','$userTitle', '$userContent', 1 )";

if (mysqli_query($con, $sql)) {
  echo "Данные успешно добавлены";
} else {
  echo "Ошибка: " . $sql . "<br>" . mysqlierror($con);
}







 //выражение include вкл и выполняет указанный файл 
 
// $query_get_category = "select * from categories "; 
// $types = ['image/jpg', 'image/png', 'image/jpeg'];
// if (mb_strlen($userTitle)>20){
// echo "<p>слишком длинное название <br></р›";
// };

// foreach($types as $value) {
// if ($userImages[ 'type'] == $value){
// echo 'ок, картинка есть <br>';
// }
// };
// if (is_string($userTitle) && is_string($userContent) && is_string($userCategory)) {
//     echo 'норм текст <br>';
// } else {
//     echo 'напишите текст <br>';
// }

?>