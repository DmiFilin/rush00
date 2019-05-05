<?php


	function user_login_check($user_name, $user_pass, $db_init)
	{
		if ($user_name && $user_pass)
		{
			$result = mysqli_query($db_init, "SELECT id,password FROM users WHERE login='$user_name'");
			$myrow = mysqli_fetch_array($result);
			if (empty($myrow['id']))
			header("Location: auth.php?error=The login is not exist");
			else if ($myrow['password'] == $user_pass)
			header("Location: auth.php?sucess=You are now logined");
			else
			header("Location: auth.php?error=Incorrect login or password");
		}
		else
		header("Location: auth.php?error=Incorrect login or password");
	}


	function user_add($user_name, $user_pass, $db_init)
	{
		if ($user_name && $user_pass)
		{
			$result = mysqli_query($db_init, "SELECT id FROM users WHERE login='$user_name'");
			$myrow = mysqli_fetch_array($result);
			if (!empty($myrow['id']))
				header("Location: register.php?error=The login is already exist");
			else
			{
				$result2 = mysqli_query($db_init, "INSERT INTO users (login,password) VALUES('$user_name','$user_pass')");
				if ($result2 == 'TRUE')
					header("Location: register.php?sucess=You are now registered");
				else
					header("Location: register.php?error=Some errors. You are not registered");
			}
		}
		else
			header("Location: register.php?error=Incorrect password or login");
	}


	function a_user_del($user_name, $db_init)
	{
		if ($user_name)
		{
			$result = mysqli_query($db_init, "SELECT id,a_status FROM users WHERE login='$user_name'");
			$myrow = mysqli_fetch_array($result);
			if (empty($myrow['id']))
				header("Location: admin.php?error1=The login is not exist");
			else
			{
				$id = $myrow['id'];
				if ($myrow['a_status'] == 1)
					header("Location: admin.php?error1=You cant delete admin");
				else
				{
					$result2 = mysqli_query($db_init, "DELETE FROM users WHERE login='$user_name'");
					if ($result2 == 'TRUE')
						header("Location: admin.php?sucess1=You are delete are user");
					else
						header("Location: admin.php?error1=Some errors. user hasnt deleted");
				}
			}
		}
		else
			header("Location: admin.php?error1=Incorrect login");
	}

	function a_user_add($user_name, $user_pass, $a_status, $db_init)
	{
		if ($user_name && $user_pass)
		{
			$result = mysqli_query($db_init, "SELECT id FROM users WHERE login='$user_name'");
			$myrow = mysqli_fetch_array($result);
			if (!empty($myrow['id']))
			header("Location: admin.php?error=The login is already exist");
			else
			{
				$a_status = ($a_status == 'on') ? 1: 0;
				$result2 = mysqli_query($db_init, "INSERT INTO users (login,password,a_status) VALUES('$user_name','$user_pass','$a_status')");
				if ($result2 == 'TRUE')
					header("Location: admin.php?sucess=You are now registered");
				else
					header("Location: admin.php?error=Some errors. User didnt added");
			}
		}
		else
			header("Location: admin.php?error=Incorrect password or login");
	}

		include ("db_init.php");
		if (!$db_init)
			echo "cant connect to data base: " . mysqli_connect_error();
		else if ($_GET['opp'] == 'add')
			user_add($_POST['login'], $_POST['passwd'], $db_init);
		else if ($_GET['opp'] == 'login_check')
			user_login_check($_POST['login'], $_POST['passwd'], $db_init);
		else if ($_GET['opp'] == 'a_add')
			a_user_add($_POST['login'], $_POST['passwd'], $_POST['a_status'], $db_init);
		else if ($_GET['opp'] == 'a_del')
			a_user_del($_POST['login'], $db_init);
		else
			header("Location: auth.php.php");
		mysqli_close($db_init);
	?>