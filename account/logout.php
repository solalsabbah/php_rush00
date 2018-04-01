<?php
session_start();
if (isset($_SESSION["logged_on_user"]))
{
	$_SESSION["logged_on_user"] = "";
	session_destroy();
}
header('location: http://192.168.99.100:8100/php_rush00/index.php');
?>