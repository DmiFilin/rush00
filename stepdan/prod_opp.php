<?php
	function prod_add($p_name, $p_img, $p_price, $p_categ, $p_count, $db_init)
	{
		if ($p_name && $p_img && $p_price && $p_categ && $p_count)
		{
			$result = mysqli_query($db_init, "SELECT id FROM products WHERE name='$name'");
			$myrow = mysqli_fetch_array($result);
			if (!empty($myrow['id']))
				header("Location: admin.php?error3=Product is already exist");
			else
			{
				$result2 = mysqli_query($db_init, "INSERT INTO products (name, img, price, categ, count) VALUES($p_name, $p_img, $p_price, $p_categ, $p_count)");
				if ($result2 == 'TRUE')
					header("Location: admin.php?sucess3=You are now registered");
				else
					header("Location: admin.php?error3=Some errors. You are not registered");
			}
		}
		else
			header("Location: admin.php?error3=Incorrect number of parametrs");
	}
	function prod_modify($p_name, $p_img, $p_price, $p_categ, $p_count, $db_init)
	{
		if ($p_name && $p_img && $p_price && $p_categ && $p_count)
		{
			$id = $_COOKIE['prod_mod_id'];
			$result = mysqli_query($db_init, "UPDATE products SET name='$p_name', img='$p_img', price='$p_price', categ='$p_categ', count='$p_count' WHERE id = $id;");
			if ($result == 'TRUE')
				header("Location: admin.php?sucess=product was modified");
			else
				header("Location: admin.php?error=Some errors. User didnt added");
		}
		else
			header("Location: prod_modify.php?error=Incorrect parametrs of product");
	}

	function prod_del($p_name, $db_init)
	{
		if ($p_name)
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
			header("Location: prod_modify.php?error4=Incorrect ");
	}

		include ("db_init.php");
		if (!$db_init)
			echo "cant connect to data base: " . mysqli_connect_error();
		else if ($_GET['opp'] == 'add')
			prod_add($_POST['name'], $_POST['img'],$_POST['price'],$_POST['categ'],$_POST['count'], $db_init);
		else if ($_GET['opp'] == 'modify')
			prod_modify($_POST['name'], $_POST['img'],$_POST['price'],$_POST['categ'],$_POST['count'], $db_init);
		else if ($_GET['opp'] == 'del')
			prod_del($_POST['name'], $db_init);
		else
			header("Location: auth.php.php");
		mysqli_close($db_init);
	?>
