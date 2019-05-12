<?php
include 'functions.php';
session_start();
$error = 0;
if ($_POST['login'] && $_POST['login'] == $_SESSION['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] == "OK")
{
    $hash = hash("gost-crypto", $_POST['oldpw']);
    $login = $_POST['login'];
    $db_init = bd_init();
    $result = mysqli_query($db_init, "SELECT login,password FROM users WHERE login='$login'");
	$myrow = mysqli_fetch_array($result);
	mysqli_close($db_init);
    if ($myrow['password'] == $hash)
    {
        $new_pass = hash("gost-crypto", $_POST['newpw']);
        $db_init = bd_init();
        $result = mysqli_query($db_init, "UPDATE users SET password='$new_pass' WHERE login='$login'");
        mysqli_close($db_init);
        header('Location: login.php');
        return;
    }
    else
        $error = 1;
}
else if ($_POST['submit'] == "OK")
    $error = 1;
?>
<html lang="en">
<head>
    <title>Authorisation</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php require "header.php"; ?>
<body>
<div class="window">
    <div class="form">
        <form class="register_form" method="post" action="modif.php">
            <input type="text" name="login" value="<?php echo $_SESSION['login']?>" placeholder="login">
            <input type="password" name="oldpw" value="" placeholder="old password">
            <input type="password" name="newpw" value="" placeholder="new password">
            <input class="sss" type="submit" name="submit" value="OK">
            <?php if ($error != 0)
                echo ('<p class="error_message">Error</p>')
            ?>
        </form>
    </div>
</div>
</body>
</html>
