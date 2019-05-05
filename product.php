<?php
session_start();
include 'install.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online-shop</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php require "header.php"; ?>
<body>
<br />
<br />
<br />
<?php
    init_bd();
    $name = substr(key($_GET), 0, -2);
    $file_data = unserialize(file_get_contents("../htdocs/private/products"));
    foreach ($file_data as $product) {
        if ($name == $product['name']) {
            ?>
            <div style="margin: auto; border: 1px solid black; width: 60%; text-align: center; height: 50%">
                <form action="" method="get">
                    <input type="image" src="<?php echo $product['img'] ?>" alt="<?php echo $product['name'] ?>" name=" <?php echo $product['name'] ?>" width="310px" height="300px">
                    <br/>
                    <p class="price2">Price: <?php echo $product['price'] ?></p>
                    <input class="add_product2" type="submit" name="submit" value="Add product">
                    <h3>Где-то тут должно быть описание! ляляля</h3>
                </form>
            </div>
            <?php
        }
    }
?>
</body>
</html>
