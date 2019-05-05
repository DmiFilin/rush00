<?php
include 'install.php';
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
<div class="menu">
    <div class="dropdown">
        <a href="index.php"><button class="one">Main</button></a>
    </div>
    <div class="dropdown">
        <button class="two">Categories</button>
        <div class="dropdown-content">
            <a href="#">T</a>
            <a href="#">O</a>
            <a href="#">P</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="index.html"><button class="three">Sign in</button></a>
    </div>
    <div class="dropdown">
        <a href="#"><button class="four">Basket</button></a>
    </div>
</div>
<div class="products">
    <div class="form">
        <form action="" method="get">
            <input type="image" src="srcs/img/boots_of_travel.jpg" alt="boots_of_travel" width="300px" height="300px">
            <br/>
            <input type="submit" name="submit" value="OK">
        </form>
    </div>
    <div class="form">
        <form action="" method="get">
            <input type="image" src="srcs/img/arcane_boots.jpg" alt="boots_of_travel" width="300px" height="300px">
            <br/>
            <input type="submit" name="submit" value="OK">
        </form>
    </div>
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