<?php
include 'install.php';
session_start();
init_bd();
//admin_del_product_from_db("boots_of_travel");
admin_add_products_in_db("boots_of_travel", "100", "srcs/img/boots_of_travel.jpg", "boots");
admin_add_products_in_db("arcane_boots", "40", "srcs/img/arcane_boots.jpg", "boots");
admin_add_products_in_db("boots_of_travel", "100", "srcs/img/bootswer", "boots");
admin_add_user("admin", "admin", 1);
admin_add_user("kto", "kto", 0);
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
<!--<div class="categories">-->
<!--    <a href="#"><div class="img">-->
<!--        <div class="name_category">-->
<!--            <p class="img_text">One</p>-->
<!--        </div>-->
<!--    </div>-->
<!--    </a>-->
<!--    <a href="#"><div class="img">-->
<!--        <div class="name_category">-->
<!--            <p class="img_text">Two</p>-->
<!--        </div>-->
<!--    </div></a>-->
<!--    <a href="#"><div class="img">-->
<!--        <div class="name_category">-->
<!--            <p class="img_text">Three</p>-->
<!--        </div>-->
<!--    </div></a>-->
<!--</div>-->
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