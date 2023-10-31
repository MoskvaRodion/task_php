<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Регистрация</title>
</head>
<body>
<?php 
    $host = 'localhost'; // имя хоста
    $pol = 'root';      // имя пользователя
    $pass = '';          // пароль
    $name = 'test';      // имя базы данных
    $link = mysqli_connect($host, $pol, $pass, $name);


  if (!empty($_POST)) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    $query = "SELECT * FROM coderu WHERE login='$login'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));

    if (empty($user)) {
        if (preg_match("/^[a-z0-9_-]{4,10}$/i", $login)){
            if ($_POST['password'] == $_POST['confirm'] && preg_match("/^[a-z0-9_-]{4,12}$/i", $password)) {
                if (strtotime($_POST['date_of_birth']) < strtotime(date('Y-m-d'))){
                session_start();
                
                $passhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                echo $passhash;
                $query = "INSERT INTO coderu (login, password, email, date_of_birth, name, surname) VALUES ('$login','$passhash','$email', '$date_of_birth', '$name', '$surname')";
                mysqli_query($link, $query);

                $_SESSION = array(
					'auth' => true,
					'id' => mysqli_insert_id($link),
					'login' => $login,
				);
                header('Location: action.php');
                }else{
                    $error_of_date = 'вы ввели непривальную дату';
                }
            }
            else{
                $errorpass = '<div>пароль должен быть от 4 до 12 символов <br></div>'; 
            }
        }else {
            $errorlenlogin = '<div>логин должен быть от 4 до 10 символов <br></div>'; 
        }
    } else {
        $errorlogin = '<div>логин уже существует<br></div>'; 
    }
}

?>

    <form action="registr.php" method="POST">
        <legend>Регистрация</legend>
        
    <div class='cols'>
        <div class='text-cols'>
            <span><?= isset($errorlogin) ? $errorlogin : ''?></span>
            <label class='forlabel' for="login">Придумайте логин</label>
        	<input name="login">

            <span><?php echo isset($errorpass) ? $errorpass : '';?></span>
            <label class='forlabel' for="password">Придумайте пароль</label>
            <input name="password" type=password>

            <label class='forlabel' for="confirm">Подтвердите пароль</label>
            <input type="password" name="confirm">

            <label class='forlabel' for="email">Введите вашу почту</label>
            <input name="email" type="email">
        </div>
        <div class='text-cols'>
        <label class='forlabel' for="name">Ваше имя</label>
        	<input name="name">

            <label class='forlabel' for="surname">Ваша фамилия</label>
        	<input name="surname">

            <label class='forlabel' for="date_of_birth">Дата рождения</label>
            <input name="date_of_birth" type="date">
            
            
            <span class='forlabel'><?= isset($error_of_date) ? $error_of_date : ''?></span>

        </div>
    </div>
    	<button type="submit">Отправить</button>
        <a href="login.php">Войти</a>
    </form>


</body>
</html>