<?php
function init_bd()
{
//    CHECK USERS DB
    if (!file_exists("../htdocs/private/users")) {
        if (!file_exists("../htdocs")){
            mkdir("../htdocs/private", 0755, true);
        }
        elseif (!file_exists("../htdocs/private"))
            mkdir("../htdocs/private", 0755, true);
        file_put_contents("../htdocs/private/users", "");
    }
//    CHECK PRODUCTS DB
    if (!file_exists("../htdocs/private/products")) {
        if (!file_exists("../htdocs")){
            mkdir("../htdocs/private", 0755, true);
        }
        elseif (!file_exists("../htdocs/private"))
            mkdir("../htdocs/private", 0755, true);
        file_put_contents("../htdocs/private/products", "");
    }
//    CHECK ORDERS DB
    if (!file_exists("../htdocs/private/orders")) {
        if (!file_exists("../htdocs")){
            mkdir("../htdocs/private", 0755, true);
        }
        elseif (!file_exists("../htdocs/private"))
            mkdir("../htdocs/private", 0755, true);
        file_put_contents("../htdocs/private/orders", "");
    }
}

function admin_del_user($user)
{
    init_bd();
    $file_data = unserialize(file_get_contents("../htdocs/private/users"));
    if ($file_data[$user] != NULL && $file_data[$user] != "") {
        unset($file_data[$user]);
        file_put_contents("../htdocs/private/users", serialize($file_data));
    }
}

function admin_add_user($login, $passwd, $status)
{
    init_bd();
    $file_data = unserialize(file_get_contents("../htdocs/private/users"));
    $file_data[$login]['login'] = $login;
    $file_data[$login]['passwd'] = hash("gost-crypto", $passwd);
    $file_data[$login]['status'] = $status;
    file_put_contents("../htdocs/private/users", serialize($file_data));
}

function user_create($login, $passwd)
{
    init_bd();
    if ($login != NULL && $login != "" && $passwd != "" && $passwd != NULL)
    {
        $file_data = unserialize(file_get_contents("../htdocs/private/users"));
        if (in_array($login, $file_data[$login]))
            return false;
        else
        {
            $file_data[$login]['login'] = $login;
            $file_data[$login]['passwd'] = hash("gost-crypto", $passwd);
            $file_data[$login]['status'] = 0;
            file_put_contents("../htdocs/private/users", serialize($file_data));
            return true;
        }
    }
    return false;
}

function check_user_in_db($login)
{
    init_bd();
    $file_data = unserialize(file_get_contents("../htdocs/private/users"));
    if (in_array($login, $file_data))
        return true;
    return false;
}

function admin_add_products_in_db($name, $price, $img)
{
    init_bd();
    $file_data = unserialize(file_get_contents("../htdocs/private/products"));
    if ($name != NULL && $price != NULL && $img != NULL) {
        $file_data[$name]['name'] = $name;
        $file_data[$name]['price'] = $price;
        $file_data[$name]['img'] = $img;
        file_put_contents("../htdocs/private/products", serialize($file_data));
    }
}

function add_in_basket($product)
{

}
?>