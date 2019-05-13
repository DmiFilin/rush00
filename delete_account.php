<?php
include_once 'functions.php';
session_start();
$error = 0;
if ($_POST['login'] != NULL && $_POST['login'] == $_SESSION['login'] && $_POST['submit'] == "OK"){
	admin_del_user($_POST['login']);
	include('logout.php');
	$_SESSION['login'] = "";
	header('Location: index.php');
}
else if ($_POST['login'])
	$error = 1;
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
			<input type="text" name="login" value="<?php echo $_SESSION['login']?>" placeholder="login">
			<input class="sss" type="submit" name="submit" value="OK">
			<?php if ($error != 0)
				echo ('<p class="error_message">Forbidden login</p>')
			?>
		</form>
	</div>
</div>
</body>
</html>