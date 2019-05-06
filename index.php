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