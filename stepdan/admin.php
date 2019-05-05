<html>
	<head>
		<title>Log in page</title>
		<meta charset="UTF-8">
		<meta name="author" content="StepDan">
		<style>
			body{
				background-color: palegreen;
			}
			.login{
				font-size: 25px;
				position: absolute;
				top: 20%;
				left: 50%;
				margin-right: -50%;
				transform: translate(-50%, -50%);
			}
			.del{
				font-size: 25px;
				position: absolute;
				top: 40%;
				left: 50%;
				margin-right: -50%;
				transform: translate(-50%, -50%);
			}
			.product{
				font-size: 25px;
				position: absolute;
				top: 60%;
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
	<h1>Admin's page</h1>
		<div class="login">
			<h1>Create a new user</h1>
			<?php if (isset($_GET['error']))
						echo "<h3>".$_GET['error']."</h3>"?>
			<form action="user_opp.php?opp=a_add" method="POST">
				Username: <input type="text" name="login"> <br />
				Password: <input type="password" name="passwd"> <br />
				Admin status: <input type="checkbox" name="a_status"> <br />
				<input type="submit" name="submit" value='OK'>
			</form>
		</div>
		<div class="del">
			<h1>Dellete a user</h1>
			<?php if (isset($_GET['error1']))
						echo "<h3>".$_GET['error1']."</h3>"?>
			<form action="user_opp.php?opp=a_del" method="POST">
				Username: <input type="text" name="login"> <br />
				<input type="submit" name="submit" value='OK'>
			</form>
		</div>
		<div class="product">
			<h1>Add new product</h1>
			<?php if (isset($_GET['error1']))
						echo "<h3>".$_GET['error1']."</h3>"?>
			<form action="user_opp.php?opp=a_del" method="POST">
				Username: <input type="text" name="login"> <br />
				<input type="submit" name="submit" value='OK'>
			</form>
		</div>
	</body>
</html>