<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/content.css">
    <title>Пользователи </title>
</head>

<body>
    <?php 
    session_start();
    include 'database.php';
    
    $query = "SELECT * FROM coderu";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    ?>
    <header><?php include 'header.php'?></header>
    <h1>Пользователи сайтом</h1>
    <ol>
        
        <?php foreach ($result as $user ){
            $id = $user['id'];?>
        <li><a href="user.php?id=<?= $id?>"><?= $user['name']. ' ' . $user['surname']?></a></li>
        <?php } ?>
    </ol>
</body>
</html>