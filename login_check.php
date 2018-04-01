<?php
	include("auth.php");
	if (isset($_POST["login"]) && isset($_POST["passwd"]) && auth($_POST["login"], $_POST["passwd"]))
	{
		// $login = mysql_real_escape_string($_POST["login"]);			!!!! DELETE THE // if we are on SQL
		// $_SESSION["logged_on_user"] = $login;
		$_SESSION["logged_on_user"] = $_POST["login"];					//And remove this one
		header('location: index.php');
	}
	else
	{
		$_SESSION["logged_on_user"] = "";
		header('location: login.php?erreurconnexion');
	}
?>