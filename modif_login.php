<?php
include 'install.php';
session_start();
$error = 0;
$file_data = unserialize(file_get_contents("../htdocs/private/users"));
if ($_POST['login'] != NULL && $_POST['newlogin'] != NULL && $_POST['submit'] == "OK")
{
	if ($file_data[$_POST['login']] != NULL)
	{
		$file_data[$_POST['login']]['login'] = $_POST['newlogin'];
		$new = serialize($file_data);
		file_put_contents("../htdocs/private/users", $new);
		header('Location: login.php');
		return;
	}
	else
		$error = 1;
}
?>
<html lang="en">
<head>
	<title>Authorisation</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php require "header.php"; ?>
<body>
<div class="window">
	<div class="form">
		<form class="register_form" method="post" action="modif_login.php">
			<input type="text" name="login" value="" placeholder="login">
			<input type="text" name="newlogin" value="" placeholder="newlogin">
			<input class="sss" type="submit" name="submit" value="OK">
			<?php if ($error != 0)
				echo ('<p class="error_message">Forbidden login</p>')
			?>
		</form>
	</div>
</div>
</body>
</html>