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
        return true;
    }
    return false;
}

function admin_add_user($login, $passwd, $status)
{
    /*
    $db_init = mysqli_connect("192.168.29.105","root", "272302", "rush_shop");
    if ($login != NULL && $passwd != NULL)
    {
        $result = mysqli_query($db_init, "SELECT id FROM users WHERE login='$login'");
        $myrow = mysqli_fetch_array($result);
        if (!empty($myrow['id']))
            return false;
        else
        {
            $status = ($status == 'on') ? 1: 0;
            $passwd = hash("gost-crypto", $passwd);
            $result2 = mysqli_query($db_init, "INSERT INTO users (login,password,a_status) VALUES('$login','$passwd','$status')");
            if ($result2 == 'TRUE')
                return true;
            else
                return false;
        }
    }
    else
        return false;
*/

    init_bd();
    if ($login != NULL && $passwd != NULL) {
        $file_data = unserialize(file_get_contents("../htdocs/private/users"));
        $file_data[$login]['login'] = $login;
        $file_data[$login]['passwd'] = hash("gost-crypto", $passwd);
        $file_data[$login]['status'] = $status;
        file_put_contents("../htdocs/private/users", serialize($file_data));
        return true;
    }
    return false;
}

function user_create($login, $passwd)
{
    init_bd();
    if ($login != NULL && $login != "" && $passwd != "" && $passwd != NULL)
    {
        $file_data = unserialize(file_get_contents("../htdocs/private/users"));
        if (array_key_exists($login, $file_data))
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
    if (array_key_exists($login, $file_data))
        return true;
    return false;
}

function admin_add_products_in_db($name, $price, $img, $category)
{
    init_bd();
    if (!file_exists($img))
        return false;
    $file_data = unserialize(file_get_contents("../htdocs/private/products"));
    if ($name != NULL && $price != NULL && $img != NULL && $category != NULL) {
        $file_data[$name]['name'] = $name;
        $file_data[$name]['price'] = $price;
        $file_data[$name]['img'] = $img;
        $file_data[$name]['categoty'] = $category;
        file_put_contents("../htdocs/private/products", serialize($file_data));
        return true;
    }
    return false;
}

function admin_del_product_from_db($name)
{
    init_bd();
    $file_data = unserialize(file_get_contents("../htdocs/private/products"));
    if (array_key_exists($name, $file_data)) {
        unset($file_data[$name]);
        file_put_contents("../htdocs/private/products", serialize($file_data));
        return true;
    }
    return false;
}

function add_in_basket($product)
{

}

function display_products()
{
    init_bd();
    $file_data = unserialize(file_get_contents("../htdocs/private/products"));
    foreach ($file_data as $product)
    {
        ?>
        <div class="form">
            <form action="product.php" method="get">
                <input type="image" src="<?php echo $product['img'] ?>" alt="<?php echo $product['name'] ?>" name="<?php ?>" width="310px" height="300px">
                <br/>
                <p class="price">Price: <?php echo $product['price'] ?></p>
<!--                <input class="add_product" type="submit" name="submit" value="Add product">-->
            </form>
            <form action="" method="get">
                <input class="add_product" type="submit" name="submit" value="Add product">
            </form>
        </div>
        <?php
    }
}
function auth($login, $passwd)
{
    $file_data = unserialize(file_get_contents("../htdocs/private/users"));
    $hash = hash("gost-crypto", $passwd);
    if ($file_data[$_POST['login']]['login'] == $login && $file_data[$_POST['login']]['passwd'] == $hash)
        return true;
    return false;
}
?>