<?php

function bd_init(){
	$name_base = "rush6";
	$bd_init = mysqli_connect("localhost", "root", "272302", $name_base);
	return $bd_init;
}

function admin_del_user($user)
{
	$db_init = bd_init();
	if ($user)
	{
		$result = mysqli_query($db_init, "SELECT id,status FROM users WHERE login='$user'");
		$myrow = mysqli_fetch_array($result);
		if (empty($myrow['id'])){
			return false;
			mysqli_close($db_init);
		}
		else
		{
			$id = $myrow['id'];
			if ($myrow['status'] == 1){
				mysqli_close($db_init);
				return false;
			}
			else
			{
				$result2 = mysqli_query($db_init, "DELETE FROM users WHERE login='$user'");
				mysqli_close($db_init);
				if ($result2 == 'TRUE')
					return true;
				else
					return false;
			}
		}
	}
	else{
		mysqli_close($db_init);
		return false;
	}
}

function admin_add_user($login, $passwd, $status)
{
  
    $db_init = bd_init();
    if ($login != NULL && $passwd != NULL)
    {
        $result = mysqli_query($db_init, "SELECT id FROM users WHERE login='$login'");
        $myrow = mysqli_fetch_array($result);
        if (!empty($myrow['id'])){
			mysqli_close($db_init);
            return false;
		}
        else
        {
            $passwd = hash("gost-crypto", $passwd);
            $result2 = mysqli_query($db_init, "INSERT INTO users (login,password,status) VALUES('$login','$passwd','$status')");
			mysqli_close($db_init);
			if ($result2 == 'TRUE')
                return true;
            else
                return false;
        }
    }
    else{
		mysqli_close($db_init);
        return false;
	}
}

function user_create($login, $passwd)
{
	echo "123";
	if ($login && $passwd)
    {
		echo "321\n";
		$db_init = bd_init();
        $result = mysqli_query($db_init, "SELECT id FROM users WHERE login='$login'");
        $myrow = mysqli_fetch_array($result);
        if (!empty($myrow['id'])){
			mysqli_close($db_init);
            return false;
		}
        else
        {
			$passwd = hash("gost-crypto", $passwd);
			$result2 = mysqli_query($db_init, "INSERT INTO users (login,password,status) VALUES('$login','$passwd', '0')");
			echo mysqli_error($db_init);
			mysqli_close($db_init);
            if ($result2 == 'TRUE')
                return true;
            else
                return false;
        }
    }
    else{
		mysqli_close($db_init);
        return false;
	}
}

function admin_add_products_in_db($name, $price, $img, $category, $count, $desc)
{
	if ($name && $price && $img && $category && $count)
	{
		$db_init = bd_init();
		$result = mysqli_query($db_init, "SELECT id FROM products WHERE name='$name'");
		$myrow = mysqli_fetch_array($result);
		if (!empty($myrow['id'])){
			mysqli_close($db_init);
			return false;
		}
		else
		{
			$result2 = mysqli_query($db_init,
			"INSERT INTO products (name, img, price, category, count, description) VALUES('$name', '$img', '$price', '$category', '$count', '$desc')");
			mysqli_close($db_init);
			if ($result2 == 'TRUE')
				return true;
			else
				return false;
		}
	}
	else{
		mysqli_close($db_init);
		return true;
	}
}

function admin_del_product_from_db($name)
{
	if ($name)
	{
		$db_init = bd_init();
		$result = mysqli_query($db_init, "SELECT id FROM products WHERE name='$name'");
		$myrow = mysqli_fetch_array($result);
		if (empty($myrow['id'])){
			mysqli_close($db_init);
			return false;
		}
		else
		{
			$id = $myrow['id'];
			$result2 = mysqli_query($db_init, "DELETE FROM products WHERE name='$name'");
			mysqli_close($db_init);
			if ($result2 == 'TRUE')
				return true;
			else
				return false;
		}
	}
	else{
		mysqli_close($db_init);
		return false;
	}
}

function add_in_basket($product)
{

}

function display_products()
{
	$db_init = bd_init();
	$arr = array();
	$result = mysqli_query($db_init, "SELECT id, name, img, price, category, count FROM products");
	while ($arr = mysqli_fetch_array($result))
		$file_data[] = $arr;
	mysqli_close($db_init);
    foreach ($file_data as $product)
    {
        ?>
        <div class="form">
            <form action="product.php" method="get">
				<input type="hidden" name="link" value="<?php echo $product['name'] ?>">
				<input type="image" src="<?php echo $product['img'] ?>" alt="<?php echo $product['name'] ?>" width="310px" height="300px">
				<p class="name"><?php echo $product['name'] ?></p>
                <p class="price">Price: <?php echo $product['price'] ?></p>
            </form>
            <!-- <form action="" method="get">
                <input class="add_product" type="submit" name="submit" value="Add product">
            </form> -->
        </div>
		<?php
	}
}

function auth($login, $passwd)
{
	$db_init = bd_init();
	$result = mysqli_query($db_init, "SELECT id,password FROM users WHERE login='$login'");
	$myrow = mysqli_fetch_array($result);
	mysqli_close($db_init);
	$hash = hash("gost-crypto", $passwd);
	if ($myrow['password'] == $hash)
		return true;
	return false;
}

function check_admin($login)
{
	$db_init = bd_init();
	$result = mysqli_query($db_init, "SELECT status FROM users WHERE login='$login'");
	$myrow = mysqli_fetch_array($result);
	mysqli_close($db_init);
	if ($myrow['status'] == 1)
		return true;
	return false;
}

function check_product($name)
{
	$db_init = bd_init();
	$result = mysqli_query($db_init, "SELECT name FROM products WHERE name='$name'");
	$myrow = mysqli_fetch_array($result);
	mysqli_close($db_init);
	if (empty($myrow['name']))
		return false;
	return true;
}

function check_user($login)
{
	$db_init = bd_init();
	$result = mysqli_query($db_init, "SELECT login FROM users WHERE login='$login'");
	$myrow = mysqli_fetch_array($result);
	mysqli_close($db_init);
	if (empty($myrow['login']))
		return false;
	return true;
}

function admin_modif_product($p_name, $p_img, $p_price, $p_categ, $p_count, $p_desc)
{
    if ($p_name && $p_img && $p_price && $p_categ && $p_count)
    {
        $id = $_COOKIE['prod_mod_id'];
        $db_init = bd_init();
		$result = mysqli_query($db_init,
		"UPDATE products SET name='$p_name', img='$p_img', price='$p_price', category='$p_categ', count='$p_count', description='$p_desc' WHERE id='$id'");
        mysqli_close($db_init);
    }
    else
        return false;
}

function admin_modif_user($u_name, $u_pass, $u_status)
{
	if ($u_name && $u_pass && $u_status)
	{
		$db_init = bd_init();
		$id = $_COOKIE['user_mod_id'];
		$result0 = mysqli_query($db_init, "SELECT id FROM users WHERE login='$u_name'");
		$myrow = mysqli_fetch_array($result0);
		if (empty($myrow['id']) || $myrow['id'] == $id){
			$u_pass = hash("gost-crypto", $u_pass);
			$result = mysqli_query($db_init, "UPDATE users SET login='$u_name', password='$u_pass', status='$u_status' WHERE id='$id'");
			mysqli_close($db_init);
		}
		else{
			mysqli_close($db_init);
			return false;
		}
	}
	else
		return false;
}
?>