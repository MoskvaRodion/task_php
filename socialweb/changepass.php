<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Смена пароля</title>
</head>
<body>
<form action="" method="POST">
        <input type="password" name='old_pass'>
        <input type="password" name='new pass'>
        <input type="password" name="new_pass_confirm">
        <button type="submit">Изменить</button>
    </form>
    <a href="profile.php">Вернуться в профиль</a>
<?php
session_start();
include 'database.php';


$id = $_SESSION['id']; // id юзера из сессии
$query = "SELECT * FROM coderu WHERE id='$id'";

$res = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($res);
$hash = $user['password'];
@$oldPassword = $_POST['old_pass'];
@$newPassword = $_POST['new_pass'];
@$newPassConfirm = $_POST['new_pass_confirm'];
// Проверяем соответствие хеша из базы введенному старому паролю
if (password_verify($oldPassword, $hash)) { 
     // соленый пароль из БД
    if ($newPassword == $newPassConfirm){
        
        $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

        $query = "UPDATE coderu  SET password='$newPasswordHash' WHERE id='$id'";
        mysqli_query($link, $query);
        header("Refresh: 4; url=profile.php");
        echo "<p align='center'><b>Пароль изменен</b><br>
        Через 4 сек. Вы будете перенаправлены
        <a href='profile.php'>на страницу Вашего профиля</a></p>";
    }
} else {
    $errorpass = 'ошибка неверный пароль';
}
?>
</body>
</html>