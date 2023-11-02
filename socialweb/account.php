
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
    <?php session_start()?>
    <title>Редактирование данных <?= $_SESSION['login']?></title>
</head>
<body>
<?php 
include 'database.php';

$id = $_SESSION['id'];
$query = "SELECT * FROM coderu WHERE id=$id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$user = mysqli_fetch_assoc($result);


if (!empty($_POST['submit'])) {
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	
	$query = "UPDATE coderu SET name='$name', surname='$surname' WHERE id='$id'";
	mysqli_query($link, $query);
}
?>
	<header><?php include 'header.php'?></header>
	<form action="" method="POST">
		<legend>Изменить данные профиля</legend>
		<label for="name">Имя<input name="name" value="<?= $user['name'] ?>"></label>
		<label for="surname">Фамилия<input name="surname" value="<?= $user['surname'] ?>"></label>
	    <button type="submit" name="submit">Изменить</button>
		<a href="profile.php">Вернуться в профиль</a>
    </form>
	

</body>
</html>