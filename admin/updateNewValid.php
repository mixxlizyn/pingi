
<?php
include "../connect.php"; 
$id = isset($_POST["id"]) ? $_POST["id"] : false;
$userTitle = isset($_POST["userTitle"]) ? $_POST["userTitle"] : false;
$userContent = isset($_POST["userContent"]) ? $_POST["userContent"] : false;
$userCategory = isset($_POST["userCategory"]) ? $_POST["userCategory"] : false;
$userImages = ($_FILES["userImages"]["size"] != 0) ? $_FILES["userImages"] : false;

function check_error($error, $id)
{
    echo "<script>alert('$error'); location.href = '/admin?new=$id';</script>";
}

$new_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM news where news_id = $id"));

$query_update = "UPDATE news SET ";

$check_update = false;
if ($new_info["title"] != $userTitle) {
    $query_update .= "title = '$userTitle', ";
    $check_update = true;
}

if ($new_info["content"] != $userContent) {
    $query_update .= "content = '$userContent', ";
    $check_update = true;
}

if ($new_info["category_id"] != $userCategory) {
    $query_update .= "category_id = $userCategory, ";
    $check_update = true;
}

if ($userImages) {
    $query_update .= "image = '" . $userImages["name"] . "', ";
    move_uploaded_file($userImages["tmp_name"], "../images/news/" . $userImages["name"]);
    $check_update = true;
}

if ($check_update) {
    $query_update = rtrim($query_update, ", "); 
    $query_update .= " WHERE news_id = $id";
    $result = mysqli_query($con, $query_update);
    if ($result) {
        check_error("Данные обновлены!", $id);
    } else {
        check_error("Ошибка обновления! " . mysqli_error($con), $id);
    }
} else {
    check_error("Данные актуальны!", $id);
}
?>