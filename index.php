<?php
include 'functions.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online-shop</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php require "header.php"; ?>
<body>
<div class="products">
    <?php display_products() ?>
</div>
</body>
<footer>

</footer>
</html>
<!--<div class="form">-->
<!--    <form action="" method="get">-->
<!--        <input type="image" src="srcs/img/arcane_boots.jpg" alt="boots_of_travel" width="310px" height="300px">-->
<!--        <br/>-->
<!--        <p class="price">Price: 100</p>-->
<!--        <input class="add_product" type="submit" name="submit" value="Add product">-->
<!--    </form>-->
<!--</div>-->