<?php
	$login = $_POST['login'];
	include ("db_init.php");
	if (!$db_init)
		echo "cant connect to data base: " . mysqli_connect_error();
	$result = mysqli_query($db_init, "SELECT id,a_status,password FROM users WHERE login='$login'");
	$myrow = mysqli_fetch_array($result);
	if (empty($myrow['id']))
	{
		header("Location: admin.php?error2=The login is not exist");
		return ;
	}
	setcookie('user_mod_id', $myrow['id']);
	$a_status = $myrow['a_status'];
	$passwd = $myrow['password'];
	mysqli_close($db_init)
?>
<html>
	<head>
		<title>Modify page</title>
		<meta charset="UTF-8">
		<meta name="author" content="StepDan">
		<style>
			body{
				background-color: palegreen;
			}
			.modi{
				font-size: 25px;
				position: absolute;
				top: 40%;
				left: 50%;
				margin-right: -50%;
				transform: translate(-50%, -50%);
			}
			h1{
				text-align: center;
			}
		</style>
	</head>
	<body>
	<h1>Modify page</h1>

		<div class="modi">
			<h1>Modify user</h1>
			<?php if (isset($_GET['error']))
						echo "<h3>".$_GET['error']."</h3>"?>
			<form action="user_opp.php?opp=modify" method="POST">
				Username: <input type="text" name="login" value=<?php echo "$login"?>> <br />
				Password: <input type="password" name="passwd" value=<?php echo "$passwd"?>> <br />
				Admin status: <input type="checkbox" name="a_status" <?php if ($a_status == 1) echo "checked";?> /> <br />
				<input type="submit" name="submit" value='OK'>
			</form>
		</div>


	</body>
</html>