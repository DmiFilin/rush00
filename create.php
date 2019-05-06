<?php
include 'functions.php';
session_start();
$error = 0;
if ($_POST['login'] != NULL && $_POST['passwd'] != NULL)
{
    if (user_create($_POST['login'], $_POST['passwd']) == true) {
        header('Location: login.php');
        return;
    }
    else {
        $error = 1;
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <link rel="stylesheet" href="login.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<?php require "header.php"; ?>
<body>
<div class="window">
    <div class="form">
        <form class="register_form" method="post" action="create.php">
            <h3>Registration</h3>
            <input type="text" name="login" value="" placeholder="login">
            <input type="password" name="passwd" value="" placeholder="password">
            <input class="sss" type="submit" name="submit" value="OK">
            <?php if ($error != 0)
                echo ('<p class="error_message">Forbidden login</p>')
            ?>
        </form>
    </div>
</div>
</body>
</html>
