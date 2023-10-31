<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/content.css">
	<?php session_start();?>
	<title>Профиль</title>
</head>
<body>
<?php
include 'database.php';

$id = $_GET['id'];

$query = "SELECT * FROM coderu WHERE id='$id'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$user = mysqli_fetch_assoc($result);


$dr = strtotime($user['date_of_birth']);
$now = strtotime(date('Y-m-d'));

$age = intval(($now - $dr) / 60 /60 / 24 / 30 / 12);
?>
	<h1> <?= $user['name']." " . $user['surname']?></h1>
	<p>
		Возраст: <span class="age"><?= $age ?></span>
	</p>
</body>
</html>

