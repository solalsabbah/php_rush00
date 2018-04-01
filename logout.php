<?php
session_start();
if (isset($_SESSION["logged_on_user"]))
{
	$_SESSION["logged_on_user"] = "";
	session_destroy();
}
header('location: ./index.php');
?>