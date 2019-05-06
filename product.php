<?php
session_start();
include 'functions.php';
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
            $name = $_GET['link'];
            $db_init = bd_init();
            $result = mysqli_query($db_init, "SELECT name, img, price, category, description FROM products WHERE name='$name'");
            $product = mysqli_fetch_array($result);
            mysqli_close($db_init);
            ?>
            <div style="margin: auto; border: 1px solid black; width: 60%; text-align: center; height: 50%">
                <form action="" method="get">
                    <input type="image" src="<?php echo $product['img'] ?>" alt="<?php echo $product['name'] ?>" name=" <?php echo $product['name'] ?>" width="310px" height="300px">
                    <br/>
                    <p class="price2">Price: <?php echo $product['price'] ?></p>
                    <input class="add_product2" type="submit" name="submit" value="Add product">
                    <h3><?php echo $product['description']?></h3>
                </form>
            </div>
</body>
</html>
