<?php
include 'install.php';
session_start();
$_SESSION['error'] = 0;
$_SESSION['success'] = 0;
$_SESSION['status'] = 0;
if ($_SESSION['login'] == NULL || $_SESSION['is_adm'] != 1) {
    header('Location: index.php');
    return;
}
if ($_POST['login'] != NULL && $_POST['passwd'] != NULL && $_POST['submit'] == "Add user") {
    if (admin_add_user($_POST['login'], $_POST['passwd'], $_POST['status']) === false)
        $_SESSION['error'] = 1;
    else
        $_SESSION['success'] = 1;
}
elseif ($_POST['login'] != NULL && $_POST['submit'] == "Delete user") {
    if (admin_del_user($_POST['login']) === false)
        $_SESSION['error'] = 2;
    else
        $_SESSION['success'] = 2;
}
elseif ($_POST['name'] != NULL && $_POST['price'] != NULL && $_POST['img'] != NULL && $_POST['submit'] == "Add product") {
    if (admin_add_products_in_db($_POST['name'],  $_POST['price'],  $_POST['img'], $_POST['category'], $_POST['count']) === false)
        $_SESSION['error'] = 3;
    else
        $_SESSION['success'] = 3;
}
elseif ($_POST['name'] != NULL && $_POST['submit'] == "Delete product"){
    if (admin_del_product_from_db($_POST['name']) === false)
        $_SESSION['error'] = 4;
    else
        $_SESSION['success'] = 4;
}
elseif ($_POST['name'] != NULL && $_POST['submit'] == "Modify product"){
	if (admin_del_product_from_db($_POST['name']) === false)
		$_SESSION['status'] = 1;
	else
		$_SESSION['status'] = 0;
}
?>
<html lang="en">
<head>
	<title>Authorisation</title>
	<meta charset="UTF-8">
</head>
<style>
	body {
		background-color: #5386ec;
	}
	div.window {
		display: block;
		text-align: center;
		margin: auto;
		width: 90vw;
		padding: 15px;
		position: relative;
	}
	div.form {
		position: relative;
		display: inline-block;
		background: white;
		max-width: 360px;
		margin: 0 auto 50px;
		padding: 15px;
		text-align: center;
		box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
	}
	.form input {
		font-family: "Roboto", sans-serif;
		outline: 0;
		background: #f2f2f2;
		width: 100%;
		border: 0;
		margin: 0 0 15px;
		padding: 15px;
		/*box-sizing: border-box;*/
		font-size: 14px;
	}
	input.sss {
		font-family: "Roboto", sans-serif;
		outline: 0;
		background: #5281e5;
		width: 100%;
		border: 0;
		padding: 15px;
		color: #FFFFFF;
		font-size: 14px;
	}
	input.sss:hover,input.sss:active,input.sss:focus {
		background: #406de5;
	}
    p.error_message {
        margin: 15px 0 0;
        color: rgba(204,45,31,0.8);
        font-family: "Helvetica", sans-serif;
        font-size: 14px;
    }
    p.success {
        margin: 15px 0 0;
        color: rgba(77,204,49,0.8);
        font-family: "Helvetica", sans-serif;
        font-size: 14px;
    }
</style>
<body>
<form action="logout.php" method="post">
    <input type="submit" name="logout" value="logout">
</form>
<form action="index.php" method="post">
    <input type="submit" name="main" value="main">
</form>
<div class="window">
	<div>
		<h1>Manage users</h1>
		<div class="form">
			<form class="register_form" method="post" action="admin.php">
				<h1>Add new user</h1>
				<input type="text" name="login" value="" placeholder="login">
				<input type="password" name="passwd" value="" placeholder="password">
                <input type="text" name="status" value="" placeholder="status: 1 - admin, 2 - user">
				<input class="sss" type="submit" name="submit" value="Add user">
                <?php if ($_SESSION['error'] == 1)
                    echo ('<p class="error_message">Error</p>');
                    elseif ($_SESSION['success'] == 1)
                    echo ('<p class="success">Success</p>');
                ?>
			</form>
		</div>
		<div class="form">
			<form class="register_form" method="post" action="admin.php">
				<h1>Delete user</h1>
				<input type="text" name="login" value="" placeholder="login">
				<input class="sss" type="submit" name="submit" value="Delete user">
                <?php if ($_SESSION['error'] == 2)
                    echo ('<p class="error_message">Error</p>');
                elseif ($_SESSION['success'] == 2)
                    echo ('<p class="success">Success</p>');
                ?>
			</form>
		</div>
	</div>
	<br />
	<div>
		<h1>Manage products</h1>
		<div class="form">
			<form class="register_form" method="post" action="admin.php">
				<h1>Add new product</h1>
				<input type="text" name="name" value="" placeholder="name">
				<input type="text" name="price" value="" placeholder="price">
				<input type="text" name="img" value="" placeholder="img">
                <input type="text" name="category" value="" placeholder="category">
				<input type="text" name="count" value="" placeholder="count">
                <input type="text" name="description" value="" placeholder="description">
				<input class="sss" type="submit" name="submit" value="Add product">
                <?php if ($_SESSION['error'] == 3)
                    echo ('<p class="error_message">Error</p>');
                elseif ($_SESSION['success'] == 3)
                    echo ('<p class="success">Success</p>');
                ?>
			</form>
		</div>
		<div class="form">
			<form class="register_form" method="post" action="admin.php">
				<h1>Delete product</h1>
				<input type="text" name="name" value="" placeholder="name">
				<input class="sss" type="submit" name="submit" value="Delete product">
                <?php if ($_SESSION['error'] == 4)
                    echo ('<p class="error_message">Error</p>');
                elseif ($_SESSION['success'] == 4)
                    echo ('<p class="success">Success</p>');
                ?>
			</form>
		</div>
		<?php if ($_SESSION['status'] == 0)
			echo (' <div class="form">
            <form class="register_form" method="post" action="admin.php">
                <h1>Modify product</h1>
                <input type="text" name="name" value="" placeholder="name">
                <input class="sss" type="submit" name="submit" value="Modify product">
            </form>
        </div>');
        elseif ($_SESSION['status'] == 1)
			echo ('<div class="form">
			<form class="register_form" method="post" action="admin.php">
				<h1>Modify product</h1>
				<input type="text" name="name" value="" placeholder="name">
				<input type="text" name="price" value="" placeholder="price">
				<input type="text" name="img" value="" placeholder="img">
                <input type="text" name="category" value="" placeholder="category">
				<input type="text" name="count" value="" placeholder="count">
                <input type="text" name="description" value="" placeholder="description">
				<input class="sss" type="submit" name="submit" value="Add product">
			</form>
		</div>');
		?>
	</div>
</div>
</body>
</html>