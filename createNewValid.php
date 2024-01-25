<?php
$userTitle = $_POST["userTitle"];
$userContent = $_POST["userContent"];
$userCategory = $_POST["userCategory"];
$userImages = $_FILES["userImages"];
$types = ['image/jpg', 'image/png'];

if(mb_strlen ($userTitle) >20) 
echo "Слишком длинное название  <br>";

foreach($types as $value){
    if ($userImages['type']==$value){
        echo "правильный тип файла  <br>";
        break;
    }
    else{
        echo "неправильный тип файла изображения<br>";
    }
        
   
}
// if(is_string($userTitle) && is_string($userContent))
// echo "умничка, правильный текст <br>";
// else echo "неправильный текст";



// var_dump($userAvatar)
// $destination ="images/avatars" . $userImages['name'];
// $filename= $userImages["tmp_name"];
// $check_uploaded = move_uploaded_file($filename,$destination);
// var_dump($check_uploaded);


?>