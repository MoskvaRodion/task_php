<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
</head>
<body>  
    <header><?php include 'header.php'?></header>
    <table border=1px solid>
    <tr>
        <td>Логин</td>
        <td>Статус</td>
        <td>Удаление пользователя</td>
        <td>Изменение статуса</td>
    </tr>
    <?php 
    include 'database.php';
    session_start();
    
    $query = 'SELECT * FROM coderu';
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    foreach ($result as $user) {?>
        
        <tr style="background:<?= ($user['status'] == 'user') ? 'green' : 'red'?>; color: white">
            <td><?= $user['login']?></td>
            <td><?= $user['status']?></td>
            <td><a href="admin.php?fun=delete&id=<?=$user['id']?>">Удаление</a></td>
            <td><a href="admin.php?fun=update&status=<?=$user['status']?>&id=<?=$user['id']?>"><?= ($user['status'] == 'admin') ? 'понизить': 'повысить'?></a></td>
        </tr>
    <?php };
   
    if (@$_GET['fun'] == 'update'){
        $id = $_GET['id'];
        $stat = ($_GET['status'] == 'admin') ? 'user' : 'admin' ;
        $update = "UPDATE coderu SET status='$stat' WHERE id='$id'";
	    mysqli_query($link, $update);
        header('location: admin.php');
    };
    if (@$_GET['fun'] == 'delete'){
        $id = $_GET['id'];
        $delete = "DELETE FROM coderu WHERE id='$id'";
	    mysqli_query($link, $delete);
        header('location: admin.php');
    }
    ?>

</table>
</body>
</html>