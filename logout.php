<?php
session_start();
$_SESSION['loggued_on_user'] = "";
$_SESSION['is_adm'] = 0;
header('Location: index.php');
?>