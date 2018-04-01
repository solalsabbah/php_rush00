<?php
	function create_foldpasswd()
	{
		if (!file_exists("./private"))
			mkdir("./private");
		if (!file_exists("./private/passwd"))
			file_put_contents("./private/passwd", NULL);
	}
	create_foldpasswd();
	$login_def = isset($_POST["login"]);
	if ($login_def && ($content = file_get_contents("./private/passwd")))
	{
		$final = unserialize($content);
		foreach ($final as $key => $value) {
			if ($value["login"] === $_POST["login"])
			{
				header('location: create_account_page.php?alreadyexist');
				return ;
			}
		}
	}
	if ($login_def && isset($_POST["passwd"]) && $_POST["passwd"] != "")
	{
		// $login = mysql_real_escape_string($_POST["login"]);              !!!! DELETE THE // if we are on SQL
		// $to_compr["login"] = $login;
		$to_compr["login"] = $_POST["login"];										//And remove this line
		$to_compr["passwd"] = hash("whirlpool", $_POST["passwd"]);
		$final[] = $to_compr;
		$seria = serialize($final);
		if (file_put_contents("./private/passwd", $seria))
			header('location: ./login.php');
	}
	else
		header('location: create_account_page.php?error');
?>