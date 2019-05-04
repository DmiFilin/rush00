<?php
if (!file_exists("../htdocs/private/passwd")) {
    if (!file_exists("../htdocs")){
        mkdir("../htdocs/private", 0755, true);
    }
    elseif (!file_exists("../htdocs/private"))
        mkdir("../htdocs/private", 0755, true);
    file_put_contents("../htdocs/private/passwd", "");
}
$file_data = unserialize(file_get_contents("../htdocs/private/passwd"));
if ($_POST['login'] != NULL && $_POST['passwd'] != NULL && $_POST['submit'] == "OK")
{
    $hash = hash("gost-crypto", $_POST['passwd']);
    if ($file_data[$_POST['login']] != NULL && $file_data[$_POST['login']]['passwd'] != $hash)
        echo("ERROR\n");
    elseif (!$file_data[$_POST['login']])
    {
        $file_data[$_POST['login']]['login'] = $_POST['login'];
        $file_data[$_POST['login']]['passwd'] = $hash;
        $new = serialize($file_data);
        file_put_contents("../htdocs/private/passwd", $new);
        header('Location: index.php');
        echo("OK\n");
    }
    elseif ($file_data[$_POST['login']]['login'] == $_POST['login'])
    {
        echo ("ERROR\n");
    }
}
else {
    echo("ERROR\n");
}
?>