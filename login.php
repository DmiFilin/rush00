<?php

include 'auth.php';

session_start();
if (!file_exists("../htdocs/private/passwd")) {
    if (!file_exists("../htdocs")){
        mkdir("../htdocs/private", 0755, true);
    }
    elseif (!file_exists("../htdocs/private"))
        mkdir("../htdocs/private", 0755, true);
    file_put_contents("../htdocs/private/passwd", "");
}
$file_data = unserialize(file_get_contents("../htdocs/private/passwd"));
if ($_POST['login'] != NULL && $_POST['passwd'] != NULL)
{
    if (auth($_POST['login'], $_POST['passwd']) === true) {
        $_SESSION['loggued_on_user'] = $_POST['login'];
    }
    else {
        echo("ERROR\n");
        $_SESSION['loggued_on_user'] = "";
        return ;
    }

}
else {
    $_SESSION['loggued_on_user'] = "";
    echo("ERROR\n");
    return ;
}
?>
