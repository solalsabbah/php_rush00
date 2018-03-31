<?PHP

function auth($login, $passwd) {

	$data = unserialize(file_get_contents("../private/passwd")); // ce fichier qui contient les logins admins et users

	$var = 0;
	foreach ($data as $key => $field)
	{	
		if ($field['login'] == $login && $field['passwd'] == hash("whirlpool", $passwd))
		{
			if($field['access'] == "admin")
				return ("admin");
			if($field['access'] == "user")
				return ("user");
		}
	}
	return ("INVALID");
}

?>
