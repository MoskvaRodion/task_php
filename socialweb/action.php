<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/content.css">
    <title>Сайт</title>
</head>
<body>
<div class='right_space'>
  
<?php 
session_start();
$id = $_SESSION['id'];
echo "<ul class='header-text'>";
if (!empty($_SESSION['auth'])){?>
    
    <header><?php include 'header.php'?></header>
    <li><a href="users.php">Пользователи сайта</a></li>
    <li><a href='logout.php'>выйти</a></li>
<?php }else {
    echo "<a href='login.php'>авторизоваться</a>";
}
echo '</ul>';
?>

</div>
<p>
Искусство - это одно из самых ярких проявлений человеческого духа, 
которое позволяет нам заглянуть в самые глубокие уголки своей души и открыть для себя новые грани мира. 
Живопись - одна из самых древних и прекрасных форм искусства, которая на протяжении веков вдохновляет и поражает своей глубиной и разнообразием.
</p>
<?php 

	if (!empty($_SESSION['auth'])) {?>
		<p>
        Живопись существует в разных формах и стилях, начиная от классического реализма и заканчивая абстрактным экспрессионизмом.
         Каждый стиль предлагает свой уникальный взгляд на мир и раскрывает перед нами новые горизонты. Например, импрессионизм, 
         который акцентирует внимание на игре света и тени, или кубизм, представляющий предметы в виде геометрических форм.
        </p>
	
   <?php } else{ ?>
        <p style='color: red; text-align:center;'>private</p> 
    <?php }
?>
<p>
На протяжении веков художники стремились передать свои эмоции и переживания через свои произведения,
 создавая уникальные и неповторимые образы. Великие мастера, такие как Леонардо да Винчи, Винсент Ван Гог, Клод Моне,
  Пабло Пикассо и другие, оставили после себя огромное наследие, которое продолжает вдохновлять поколения художников и любителей искусства.
</p>

<p>
Сегодня живопись остается актуальной и разнообразной, ведь каждый художник ищет свой неповторимый стиль, 
чтобы выразить свою индивидуальность и поделиться своими мыслями и чувствами с миром. Живопись никогда не перестанет удивлять и радовать нас
</p>

</body>
</html>