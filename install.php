<?php
session_start();
$name_base = "rush6";
if ($_POST['submit'])
{
	$bd_init = mysqli_connect("localhost", "root", "272302");
	if ($bd_init)
	{
		mysqli_query($bd_init, "CREATE DATABASE $name_base");
		mysqli_query($bd_init, "CREATE TABLE `$name_base`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `login` VARCHAR(40) NOT NULL , `password` VARCHAR(70) NOT NULL , `status` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB");
		mysqli_query($bd_init, "CREATE TABLE `$name_base` .`products` ( `id` INT NOT NULL AUTO_INCREMENT ,  `name` TEXT NOT NULL ,  `img` TEXT NOT NULL ,  `price` FLOAT NOT NULL ,  `category` TEXT NOT NULL ,  `count` INT NOT NULL , `description` TEXT NOT NULL , PRIMARY KEY  (`id`)) ENGINE = InnoDB");
		mysqli_close($bd_init);
		$_SESSION['status'] = 1;
	}
	else
		$_SESSION['error'] = 1;
}
else
	$_SESSION['error'] = 0;
if ($_SESSION['status'] == 1 && $_POST['login'] != NULL && $_POST['passwd'] != NULL)
{
	$bd_init = mysqli_connect("localhost", "root", "272302", $name_base);
	if ($bd_init)
	{
		$login = $_POST['login'];
		$pass = hash("gost-crypto", $_POST['passwd']);
		print($name_base);
		mysqli_query($bd_init, "INSERT INTO `users` (id, login, password, status) VALUES ('1', '$login', '$pass', '1')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('1', 'poision illusion', 'srcs/img/illusion.jpg', '650', 'flask', '2', 'создает 2 ваших копии, длительность 1 мин')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('2', 'poision haste', 'srcs/img/haste.jpg', '650', 'flask', '2', 'увеличивает вашу скорость передвижения до максимума, длительность 1 мин')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('3', 'Aghanim's Scepter', 'srcs/img/aganim.jpg', '4200', 'weapon', '1', 'Пассивная: Ultimate Upgrade — улучшает ульт, а также некоторые способности части героев.\r\n+ 10 ко всем атрибутам\r\n+ 175 к здоровью\r\n+ 175 к мане')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('4', 'desolator', 'srcs/img/desolator.jpeg', '3500', 'weapon', '3', 'Пассивная: Corruption — ваши атаки уменьшают броню цели на 15 секунд.')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('5', 'boots of travel', 'srcs/img/boots_of_travel.jpg', '2500', 'boots', '2', 'телепортирует вас к дружественному юниту, не являющимся героем, или сооружению. Двойное нажатие телепортирует вас к фонтану вашей команды. Улучшение позволяет телепортироваться к союзным героям +32% к скорости передвижения')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('6', 'tranquil boots', 'srcs/img/tranquil_boots.jpg', '1050', 'boots', '3', 'Если владельца атаковало существо или он атаковал героя, то предмет 13 сек. будет восстанавливать на 16 здоровья в секунду меньше, а бонус к скорости передвижения уменьшится на 18% +26% к скорости передвижения +16 к регенерации здоровья')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('7', 'shadow blade', 'srcs/img/shadow.png', '2800', 'weapon', '2', 'Активируемая: Shadow Walk — делает вас невидимым на время действия или до момента вашей атаки или использования заклинания. + 22 к урону +30 к скорости атаки длительность невидимости: 14.0')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('8', 'poision invis', 'srcs/img/invis.jpg', '650', 'flask', '20', 'делает вас невидимым, длительность 1 мин')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('9', 'poision dd', 'srcs/img/dd.jpg', '650', 'flask', '15', 'увеличивает ваш урон в 2 раза, длительность 1 мин')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('10', 'sange and yasha', 'srcs/img/sange_and_yasha.jpg', '4150', 'weapon', '3', '+ 16 к урону +16 к силе +16 к ловкости +12 к скорости атаки +16% к сопротивлению эффектам +30 к скорости передвежения')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('11', 'poision regeniration', 'srcs/img/regeniration.jpg', '650', 'flask', '20', 'восстанавливает ваше здоровье до максимум, длительность 1 мин')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('12', 'Divine Rapier', 'srcs/img/rapira.png', '6000', 'weapon', '1', 'увеличивает урон +330 к урону')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('13', 'phase boots', 'srcs/img/phase_boots.jpg', '1480', 'boots', '7', 'Пассивная: Corruption — ваши атаки уменьшают броню цели на 15 секунд.')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('14', 'batllefury', 'srcs/img/batllefury.jpg', '5475', 'weapon', '1', 'Наносит физический урон, равный 40% урона от атак, всем врагам вокруг основной цели в конусе радиусом 625 (только в ближнем бою). Урон Cleave уменьшается типом брони, но не значением брони +45 к урону +7.5 к регенерации здоровья +3.75 к регенерации маны')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('15', 'arcane boots', 'srcs/img/arcane_boots.jpg', '1400', 'boots', '12', 'восстанавливает ману всем союзникам + 15% к скорости передвижения +250 к мане')");
		mysqli_query($bd_init, "INSERT INTO `products` (id, name, img, price, category, count, description) VALUES ('16', 'daedalus', 'srcs/img/daedalus.jpg', '5330', 'weapon', '2', 'Пассивная: Critical Strike — дает шанс нанести дополнительный урон при каждой атаке. Строениям дополнительный урон не наносится. +80 к урону ШАНС КРИТА: 30% КРИТИЧЕСКИЙ УРОН: 235%')");
		mysqli_close($bd_init);
		header('Location: index.php');
	}
	else if ($_SESSION['status'] == 1)
	{
		$_SESSION['status'] = 0;
		$_SESSION['error'] = 1;
	}
}
else if ($_SESSION['status'] == 1 && $_POST['submit2'])
	$_SESSION['error'] = 1;
?>

<html lang="en">
<head>
	<title>Installation</title>
	<meta charset="UTF-8">
</head>
<style>
	body {
		background-color: #5386ec;
	}
	div.window {
		display: block;
		text-align: center;
		margin: auto;
		width: 90vw;
		padding: 15px;
		position: relative;
	}
	div.form {
		position: relative;
		display: inline-block;
		background: white;
		max-width: 360px;
		margin: 200px auto 50px;
		padding: 15px;
		text-align: center;
		box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
	}
	.form input {
		font-family: "Roboto", sans-serif;
		outline: 0;
		background: #f2f2f2;
		width: 100%;
		border: 0;
		margin: 0 0 15px;
		padding: 15px;
		font-size: 14px;
	}
	input.sss {
		font-family: "Roboto", sans-serif;
		outline: 0;
		background: #5281e5;
		width: 100%;
		border: 0;
		padding: 15px;
		color: #FFFFFF;
		font-size: 14px;
	}
	input.sss:hover,input.sss:active,input.sss:focus {
		background: #406de5;
	}
    p.error_message {
        margin: 15px 0 0;
        color: rgba(204,45,31,0.8);
        font-family: "Helvetica", sans-serif;
        font-size: 14px;
    }
    p.success {
        margin: 15px 0 0;
        color: rgba(77,204,49,0.8);
        font-family: "Helvetica", sans-serif;
        font-size: 14px;
    }
</style>
<body>

<div class="window">
	<div>
		<?php if ($_SESSION['status'] == 0)
			echo (' <div class="form">
			<form class="register_form" method="post" action="install.php">
				<h1>Check connection</h1>
				<input class="sss" type="submit" name="submit" value="Connect">
			</form>');
		elseif ($_SESSION['status'] == 1)
			echo ('<div class="form">
			<form class="register_form" method="post" action="install.php">
				<h1>Add root user</h1>
				<input type="text" name="login" value="" placeholder="login">
				<input type="password" name="passwd" value="" placeholder="password">
				<input class="sss" type="submit" name="submit2" value="Add user">
			</form>');
		if ($_SESSION['error'] == 1)
			echo ('<p class="error_message">Error</p></div>');
		elseif ($_SESSION['success'] == 1)
			echo ('<p class="success">Success</p></div>');
		?>
	</div>
</div>
</body>
</html>