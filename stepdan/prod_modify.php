<?php
	$p_name = $_POST['name'];
	include ("db_init.php");
	if (!$db_init)
		echo "cant connect to data base: " . mysqli_connect_error();
	$result = mysqli_query($db_init, "SELECT id, img, price, categ, count FROM products WHERE name='$p_name'");
	$myrow = mysqli_fetch_array($result);
	setcookie('prod_mod_id', $myrow['id']);
	if (empty($myrow['id']))
	{
		header("Location: admin.php?error4=The product is not exist");
		return ;
	}
	$p_img = $myrow['img'];
	$p_price = $myrow['price'];
	$p_categ = $myrow['categ'];
	$p_count = $myrow['count'];
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
			<h1>Modify product</h1>
			<?php if (isset($_GET['error']))
						echo "<h3>".$_GET['error']."</h3>"?>
			<form action="prod_opp.php?opp=modify" method="POST">
				product name: <input type="text" name="name" value=<?php echo "$p_name"?>> <br />
				img: <input type="text" name="img" value=<?php echo "$p_img"?>> <br />
				price: <input type="text" name="price" value=<?php echo "$p_price"?>> <br />
				categorys: <input type="text" name="categ" value=<?php echo "$p_categ"?>> <br />
				count: <input type="text" name="count" value=<?php echo "$p_count"?>> <br />
				<input type="submit" name="submit" value='OK'>
			</form>
		</div>


	</body>
</html>