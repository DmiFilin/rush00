<?php
include 'install.php'


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online-shop</title>
</head>
<style>
body {
    background-color: white;
}
div.menu {
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    /*left: -30px;*/
    /*text-align: center;*/
    width: 105%;
    min-width: 1000px;
    height: 100px;
    /*overflow: hidden;*/
    /*background-color: #333;*/
    /*border: 1px solid black;*/
    /*background-color: #2b2b2b;*/
    /*text-align: center;*/
    /*text-decoration: none;*/
}
button {
    /*padding: 0;*/
    width: 100%;
    height: 100%;
    color: white;
    font-size: 20px;
    border: none;
}

div.dropdown {
    /*padding: -50px;*/
    display: inline-block;
    width: 24%;
    height: 30%;
    color: white;
    position: relative;
    background-color: inherit;
    font-family: inherit;
}

button.one {
    background-color: #d7503f;
}

button.two {
    background-color: #f1bd42;
}

button.three {
    background-color: #f1bd42;
}

button.four {
    background-color: #f1bd42;
}

.dropdown-content {
    display: none;
    /*vertical-align: middle;*/
    width: 100%;
    /*z-index: 1;*/
    height: 100px;
    position: absolute;
    background-color: #f9f9f9;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    /*z-index: 1;*/
    /*margin-top: 20px;*/
    /*padding-top: 10px;*/
    text-decoration: none;
    font-size: 20px;
    font-family: "Roboto", sans-serif;
    text-align: center;
    /*padding-left: 20px;*/
    display: block;
    height: 33%;
    color: black;
    /*margin: auto;*/
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover button.one{
    background-color: lightcoral;
}

.dropdown:hover button.two{
    background-color: lightgreen;
}

.dropdown:hover button.three{
    background-color: lightblue;
}

.dropdown:hover button.four{
    background-color: lightgray;
}

    div.categories {
        top: 50px;
        position: relative;
        /*display: inline-block;*/
        margin: auto;
        width: 80%;
        height: 600px;
        border: 1px solid black;
        text-align: center;
    }
    div.img {
        position: relative;
        /*padding: 0;*/
        /*margin: 0;*/
        display: inline-block;
        /*margin: auto;*/
        /*position: absolute;*/
        height: 100%;
        width: 32%;
        border: 1px solid red;
        /*background-image: url("https://cdnb.artstation.com/p/assets/images/images/014/147/887/large/sere-arena-tr.jpg?1542692072");*/
        /*background-repeat: no-repeat;*/
    }
    div.name_category {
        position: absolute;
        width: 100%;
        height: 100px;
        bottom: 0;
        background-color: rgba(43, 43, 43, 0.6);;
        opacity: initial;
        border: 1px solid green;
        text-align: center;
        font-size: 30px;
    }
    div.name_category:hover {
        background-color: rgba(43, 43, 43, 1.0);
    }
    p.img_text {
        text-decoration: none;
        color: white;
    }
    div.products {
        /*text-align: center;*/
        display: block;
        width: 80vw;
        margin: auto;
        border: 1px solid black;
    }
    div.form {
        display: inline-block;
        text-align: center;
        border: 1px solid green;
    }
    div.test {
        /*display: block;*/
        text-align: center;
    }
    form {
        display: block;
    }
    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        /*background: #f2f2f2;*/
        /*width: 100%;*/
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }
</style>
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