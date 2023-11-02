<?php session_start()?>
<h3><?= "<a href='profile.php'>{$_SESSION['login']}</a>"?> | <?= ($_SESSION['status']== 'admin') ? "<a href='admin.php'>Админская страница</a>" : 'пользователь' ?></h3>
