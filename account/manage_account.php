<?php
function modify_pw()
{
	if (isset($_SESSION["logged_on_user"]) && ($content = file_get_contents("../private/passwd")) && isset($_POST["submit"]) && $_POST["submit"] === "OK")
	{
		$final = unserialize($content);
		$pwhash = hash("whirlpool", $_POST["oldpw"]);
		file_put_contents("../private/test", "la");
		foreach ($final as $key => $value) {
			if ($value["login"] === $_SESSION["logged_on_user"] && $value["passwd"] === $pwhash && $_POST["newpw"] != "")
			{
				$value["passwd"] = hash("whirlpool", $_POST["newpw"]);
				$final[$key] = $value;
				$seria = serialize($final);
				if (file_put_contents("../private/passwd", $seria))
				{
					header('location: manage_account.php?success');
					exit;
				}
			}
		}
	}
	header('location: manage_account.php?erreurmdp');
}

function del_usr()
{
	print_r($_SESSION);
	if (isset($_SESSION["logged_on_user"]) && $_SESSION["logged_on_user"] != "")
	{
		$content = file_get_contents("../private/passwd");
		$final = unserialize($content);
		 foreach ($final as $key => $value) {
		 	if ($value["login"] === $_SESSION["logged_on_user"])
		 	{
		 		unset($final[$key]);
		 		break;
		 	}
		 }
		 $seria = serialize($final);
		 file_put_contents("../private/passwd", $seria);
		 session_destroy();
		 header('location: ../index.php');
	}
}
?>

<html>
<head>
	<meta charset="utf-8" />
	<title>Gestion de compte</title>
	<link rel="stylesheet" type="text/css" href="http://192.168.99.100:8100/php_rush00/style.css">
</head>
<body>
<?php
define("_PATH_", "../");
include(_PATH_.'/static/header.php');
?>
<?= (isset(array_keys($_GET)[0]) AND (array_keys($_GET)[0] == "success"))?"<h2 style='text-align: center; color: green;'>Mot de passe modifié.</h2>":"" ?>
	<div class="box log">
		<h1 id="title_account">Modification du mot de passe</h1>
		<form method="post" action="manage_account.php">
			Ancien mot de passe: <input type="password" name="oldpw" <?= (isset(array_keys($_GET)[0]) AND (array_keys($_GET)[0] == "erreurmdp" OR array_keys($_GET)[0] == "error"))?"style='background-color: rgba(255, 0, 0, 0.5);' placeholder='Mot de passe erroné.'":"" ?>/>
			Nouveau mot de passe: <input type="password" name="newpw" />
			<input type="submit" class="effects but_acc" id="button" name="submit" value="OK" />
		</form>
	</div>
	<div class="box log">
		<form method="POST" action="manage_account.php">
			<input type="submit" id="button" class="effects but_acc del_ac" name="submit" value="Supprimer le compte" />
		</form>
	</div>

<?php
if (isset($_POST['submit']) && $_POST['submit'] == "OK" && isset($_POST['oldpw']) && isset($_POST['newpw']))
	modify_pw();
if (isset($_POST['submit']) && $_POST['submit'] == "Supprimer le compte")
	del_usr();
include('../static/footer.html'); ?>
</body>
</html>