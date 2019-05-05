<?php
session_start();
?>
<header>
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
            <?php
            if ($_SESSION['loggued_on_user'] == NULL || $_SESSION['loggued_on_user'] == "")
			    echo ('<a href="login.php"><button class="three">Sign in</button></a>');
            else {
                echo('<a href="logout.php"><button class="three">Logout</button></a>');
            }
            ?>
		</div>
		<div class="dropdown">
			<a href="basket.php"><button class="four">Basket</button></a>
		</div>
	</div>
</header>