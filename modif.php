<?php
if (!file_exists("../htdocs/private/passwd")) {
    mkdir("../htdocs/private", 0755, true);
    file_put_contents("../htdocs/private/passwd", "");
}
$file_data = unserialize(file_get_contents("../htdocs/private/passwd"));
if ($_POST['login'] != NULL && $_POST['oldpw'] != NULL && $_POST['newpw'] != NULL && $_POST['submit'] == "OK")
{
    $hash = hash("gost-crypto", $_POST['oldpw']);
    if ($file_data[$_POST['login']] != NULL && $file_data[$_POST['login']]['passwd'] == $hash)
    {
        $new_pass = hash("gost-crypto", $_POST['newpw']);
        $file_data[$_POST['login']]['passwd'] = $new_pass;
        $new = serialize($file_data);
        file_put_contents("../htdocs/private/passwd", $new);
        header('Location: index.php');
        echo ("OK\n");
    }
    else
        echo("ERROR\n");
}
else {
    echo("ERROR\n");
}
?>