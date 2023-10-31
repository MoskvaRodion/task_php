<?php
session_start();
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
