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
		<div class="login">
			<h1>Welcome</h1>
			<?php if (isset($_GET['error']))
						echo "<h3>".$_GET['error']."</h3>"?>
			<form action="user_opp.php?opp=login_check" method="POST">
				Username: <input type="text" name="login"> <br />
				Password: <input type="password" name="passwd"> <br />
				<input type="submit" name="submit" value='OK'>
			</form>
			<a href="register.php"><button>register</button></a>
		</div>
	</body>
</html>