<?php
include "../connect.php"; 

 $userTitle = isset($_POST["userTitle"]) ? $_POST["userTitle"] : false;
 $userContent = isset($_POST["userContent"]) ? $_POST["userContent"] : false;
 $userCategory = isset($_POST["userCategory"]) ? $_POST["userCategory"] : false;
 $userImages = isset($_FILES["userImages"]["tmp_name"]) ? $_FILES["userImages"] : false;

 function check ($error)
 {
    return "<script>alert('$error'); location.href ='/admin';</script>";
 }

if ($userTitle and $userContent and $userImages and $userCategory){
    if (strlen($userTitle)>50)
    echo  check("Название не должно быть таким длинным!");
else{
    $file_name= $userImages["name"];
    $result = mysqli_query($con,"INSERT INTO `News`( `image`, `title`, `content`, `category_id`) VALUES ( '$file_name','$userTitle', '$userContent', '$userCategory' )" );
    if ($result) {
        move_uploaded_file($userImages["tmp_name"], "images/news/$file_name");
        echo check("Новость успешна создана");
    }
    else 
    echo check("Произошла ошибка:" . mysqli_error($con));
}
}
else {
    echo check("Все поля должны быть заполнены!");
}


// $sql = "INSERT INTO `News`( `image`, `title`, `content`, `category_id`) VALUES ( '$userImages','$userTitle', '$userContent', 1 )";

// if (mysqli_query($con, $sql)) {
//   echo "Данные успешно добавлены";
// } else {
//   echo "Ошибка: " . $sql . "<br>" . mysqlierror($con);
// }







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