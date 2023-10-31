<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Смена пароля</title>
</head>
<body>
<form action="" method="POST">
        <input type="text" name='old_pass'>
        <input type="text" name='new pass'>
        <button type="submit">Изменить</button>
    </form>
<?php
session_start();
include 'database.php';


$id = $_SESSION['id']; // id юзера из сессии
$query = "SELECT * FROM coderu WHERE id='$id'";

$res = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($res);
$hash = $user['password'];
$oldPassword = $_POST['old_pass'];

// Проверяем соответствие хеша из базы введенному старому паролю
if (password_verify($oldPassword, $hash)) { 
     // соленый пароль из БД
   
    $newPassword = $_POST['new_pass'];
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    
    $query = "UPDATE coderu  SET password='$newPasswordHash' WHERE id='$id'";
    mysqli_query($link, $query);
} else {
    $errorpass = 'ошибка неверный пароль';
}
?>
</body>
</html>