<?php
include 'install.php';
session_start();
$error = 0;
$file_data = unserialize(file_get_contents("../htdocs/private/users"));
if ($_POST['login'] != NULL && $_POST['submit'] == "OK")
{
	if ($file_data[$_POST['login']] != NULL)
	{
		admin_del_user($_POST['login']);
		$_SESSION['loggued_on_user'] = "";
		$_SESSION['is_adm'] = 0;
		header('Location: index.php');
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
		<form class="register_form" method="post" action="delete_account.php">
			<input type="text" name="login" value="" placeholder="login">
			<input class="sss" type="submit" name="submit" value="OK">
			<?php if ($error != 0)
				echo ('<p class="error_message">Forbidden login</p>')
			?>
		</form>
	</div>
</div>
</body>
</html>