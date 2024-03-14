<?php
include "../connect.php";
$id_new = isset($_GET['new'])?$_GET['new']:false; //тернарный оператор
//синтаксис:  условие?значение1:значение2
$query_delete = "DELETE FROM `News` WHERE news_id = $id_new";
$result = mysqli_query($con, $query_delete);
if($result){
    echo "<script>alert('Данные удалены'); location.href = '/admin'</script>";
}
else{
    echo "<script>alert('Ошибка удаления!');</script>";
}
?>