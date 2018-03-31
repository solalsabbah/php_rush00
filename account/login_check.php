<?php
	include("auth.php");
	session_start();
	if (isset($_POST["login"]) && isset($_POST["passwd"]) && auth($_POST["login"], $_POST["passwd"]))
	{
		$_SESSION["logged_on_user"] = $_POST["login"];
		header('location: ./login.php');
	}
	else
	{
		$_SESSION["logged_on_user"] = "";
		header('location: login.php?erreurconnexion');
	}
	print_r($_SESSION);
?>