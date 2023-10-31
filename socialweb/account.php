
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php session_start()?>
    <title>Профиль <?= $_SESSION['login']?></title>
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
	<form action="" method="POST">
	    <input name="name" value="<?= $user['name'] ?>">
	    <input name="surname" value="<?= $user['surname'] ?>">
	    <input type="submit" name="submit">
    </form>

</body>
</html>