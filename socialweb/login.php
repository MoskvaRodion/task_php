<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>Авторизация</title>
</head>
<body>

<?php 
include 'database.php';
if(empty($_POST)) {?>
<form action=" " method="POST">
	<legend>Авторизация</legend>
	<div class='cols'>
		<div class='text-cols'>
			<label class='forlabel' for="login">Введите логин</label>
			<input name="login">
		</div>
		<div class="text-cols">
			<label class='forlabel' for="password">Введите пароль</label>
			<input name="password" type="password">
		</div>
	</div>
	<button type="submit">Войти</button>

	<a href="registr.php">Регистрация</a>
</form>

<?php 
}else {
    if (!empty($_POST)) {
		$login = $_POST['login'];
		$query = "SELECT * FROM coderu WHERE login='$login'";
		$res = mysqli_query($link, $query);
		$user = mysqli_fetch_assoc($res);
		$status = $user['status'];
		
		if (!empty($user)) {
			$hash = $user['password'];
			if (password_verify($_POST['password'], $hash)) {
				session_start();
				$_SESSION = array(
					'auth' => true,
					'id' => $user['id'],
					'login' => $login,
					'status' => $status,
				);
				header('Location:action.php');
			} else {
				$errorpassword = 'ошибка логина или пароля';
			}
		} else {
			$errorempty = 'такого логина не существует';
		}
	}
}
?>
</body>
</html>