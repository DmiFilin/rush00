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
</style>
<body>
<div class="window">
	<div>
		<h1>Manage users</h1>
		<div class="form">
			<form class="register_form" method="post" action="">
				<h1>Add new user</h1>
				<input type="text" name="login" value="" placeholder="login">
				<input type="password" name="passwd" value="" placeholder="password">
				<input class="sss" type="submit" name="submit" value="OK">
			</form>
		</div>
		<div class="form">
			<form class="register_form" method="post" action="">
				<h1>Delete user</h1>
				<input type="text" name="login" value="" placeholder="login">
				<input class="sss" type="submit" name="submit" value="OK">
			</form>
		</div>
	</div>
	<br />
	<div>
		<h1>Manage products</h1>
		<div class="form">
			<form class="register_form" method="post" action="">
				<h1>Add new product</h1>
				<input type="text" name="name" value="" placeholder="name">
				<input type="text" name="price" value="" placeholder="price">
				<input type="text" name="img" value="" placeholder="img">
				<input class="sss" type="submit" name="submit" value="OK">
			</form>
		</div>
		<div class="form">
			<form class="register_form" method="post" action="">
				<h1>Delete product</h1>
				<input type="text" name="name" value="name" placeholder="name">
				<input class="sss" type="submit" name="submit" value="OK">
			</form>
		</div>
	</div>
</div>
</body>
</html>