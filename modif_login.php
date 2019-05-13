<?php
include_once 'functions.php';
session_start();
$error = 0;
if ($_POST['login'] != NULL && $_POST['newlogin'] != NULL && $_POST['submit'] == "OK")
{
	$login = $_POST['login'];
	$db_init = bd_init();
    $result = mysqli_query($db_init, "SELECT id,login,password FROM users WHERE login='$login'");
	$myrow = mysqli_fetch_array($result);
	$id = $myrow['id'];
	mysqli_close($db_init);
	if ($id && $_SESSION['login'] == $_POST['login'])
	{
		$db_init = bd_init();
		$new_login = $_POST['newlogin'];
		$result2 = mysqli_query($db_init, "SELECT id FROM users WHERE login='$new_login'");
		$check = mysqli_fetch_array($result2);
		if (!$check['id'])
		{
			$result3 = mysqli_query($db_init, "UPDATE users SET login='$new_login' WHERE id='$id'");
			$_SESSION['login'] = $_POST['newlogin'];
			mysqli_close($db_init);
			header('Location: login.php');
			return;
		}
		$error = 1;
		mysqli_close($db_init);
	}
	else
		$error = 1;
}
else if ($_POST['submit'] == "OK")
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
		<form class="register_form" method="post" action="modif_login.php">
			<input type="text" name="login" value="<?php echo $_SESSION['login']?>" placeholder="login">
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