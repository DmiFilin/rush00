<?php
include 'install.php';
session_start();
$_SESSION['login_count'] = 0;
if ($_POST['login'] != NULL && $_POST['passwd'] != NULL)
{
    $file_data = unserialize(file_get_contents("../htdocs/private/users"));
    $hash = hash("gost-crypto", $_POST['passwd']);
    if ($file_data[$_POST['login']]['login'] == $_POST['login'] && $file_data[$_POST['login']]['passwd'] == $hash) {
        if ($file_data[$_POST['login']]['status'] != 0)
            header('Location: admin.php');
        header('Location: index.php');
    }
    else
        $_SESSION['login_count'] = 1;
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
        <form class="register_form" method="post" action="login.php">
            <input type="text" name="login" value="" placeholder="login">
            <input type="password" name="passwd" value="" placeholder="password">
            <input class="sss" type="submit" name="submit" value="OK">
            <?php if ($_SESSION['login_count'] != 0)
                echo ('<p class="error_message">Incorrect password or login</p>')
                ?>
            <p class="message">Not registered? <a href="create.html">Create new account</a></p>
            <p class="message">Want <a href="modif.html">change password?</a></p>
        </form>
    </div>
</div>
</body>
</html>

<?php ?>
