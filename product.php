<?php
session_start();
include_once 'functions.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online-shop</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .prod{
            margin: auto;
            border: 1px solid black;
            width: 60%;
            min-width: 350px;
            text-align: center;
            height: auto;
        }
        .desc {
            color: #222;
            font-family: 'Open Sans', sans-serif;
            font-size: 15px;
            font-weight: 400;
            line-height: 24px;
            margin: 25px 0 25px;
        }
    </style>
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
        <div class="prod">
            <form action="" method="get">
                <input type="hidden" name="link" value="<?php echo $product['name'] ?>">
                <input type="image" src="<?php echo $product['img'] ?>" alt="<?php echo $product['name'] ?>" name=" <?php echo $product['name'] ?>" width="310px" height="300px">
                <br/>
                <p class="name"><?php echo $product['name'] ?></p>
                <p class="price2">Price: <?php echo $product['price'] ?></p>
                <input class="add_product2" type="submit" name="submit" value="Add product">
                <p class="desc"><?php echo $product['description']?></p>
            </form>
        </div>
</body>
</html>
