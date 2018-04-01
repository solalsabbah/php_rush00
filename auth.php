<?php
function auth($login, $passwd)
{
	if ($content = file_get_contents("./private/passwd"))
	{
		if ($unser = unserialize($content))
		{
			$pwhash = hash("whirlpool", $passwd);
			foreach ($unser as $key => $value) {
				if ($value["login"] === $login && $value["passwd"] === $pwhash)
				{
					return TRUE;
				}
			}
		}
	}
	return FALSE;
}
?>