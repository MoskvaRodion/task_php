<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
    <?php session_start()?>
    <title>Удаление профиля</title>
</head>
<body>

    <?php
	include 'database.php';
    $id = $_SESSION['id'];
	$query = "SELECT * FROM coderu WHERE id='$id'";
	
	$res = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($res);
	
	$hash = $user['password']; // соленый пароль из БД
		
	if (!empty($_POST)){
		$password = $_POST['pass'];
		if (password_verify($password, $hash)) {
			$query = "DELETE FROM coderu WHERE id='$id'";
			mysqli_query($link, $query);
			header('location: action.php');
			header('location: logout.php');
		} else {
			echo "ошибка пароль неверный";
		}
	}// Проверяем соответствие хеша из базы введенному старому паролю

    ?>
	<header><?php include 'header.php'?></header>
	<form action="" method="POST">
		<legend>Удаление профиля</legend>
		<label for="pass">Введите пароль<input type="password" name="pass"></label>
		<button type="submit">Удалить</button>
	</form>
</body>
</html>