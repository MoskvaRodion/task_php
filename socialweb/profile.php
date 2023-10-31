<?php
session_start();
include 'database.php';

$id = $_SESSION['id'];

$query = "SELECT * FROM coderu WHERE id='$id'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$user = mysqli_fetch_assoc($result);


$dr = strtotime($user['date_of_birth']);
$now = strtotime(date('Y-m-d'));

$age = intval(($now - $dr) / 60 /60 / 24 / 30 / 12);
echo "<h1>{$user['name']}</h1>";
?>
	<p>
		Возраст: <span class="age"><?= $age ?></span>
	</p>

    <ul>
        <li><a href="account.php">Изменение данных</a></li>
        <li><a href="changepass.php">Смена пароля</a></li>
        <li><a href="action.php">Вернуться к тексту</a></li>
        <li><a href="logout.php">Выход</a></li>
    </ul>
