<?PHP
include ('auth.php');
session_start();


if (auth($_GET['login'], $_GET['passwd']) == "admin")
{
	$_SESSION['logged_on_user'] = $_GET['login'];
	//GO TO PAGE AMDIN 
	echo "OK\n";
}

elseif (auth($_GET['login'], $_GET['passwd']) == "user")
{
	$_SESSION['logged_on_user'] = $_GET['login'];
	//GO TO PAGE USERS
	echo "OK\n";
}

else
{
	$_SESSION['logged_on_user'] = "";
	//Display : Incorrect login or passwor
	echo "ERROR\n";
}

?>
