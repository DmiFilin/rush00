<?php
function auth($login, $passwd)
{
    $file_data = unserialize(file_get_contents("../htdocs/private/passwd"));
    $hash = hash("gost-crypto", $passwd);
    if ($file_data[$_POST['login']]['login'] == $login && $file_data[$_POST['login']]['passwd'] == $hash)
        return true;
    return false;
}
?>