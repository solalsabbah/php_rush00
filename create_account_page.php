<html>
<head>
	<meta charset="utf-8" />
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="http://192.168.99.100:8100/php_rush00/style.css">
</head>
<body>
<?php
include('./header.php'); ?>
	<div class="box log">
		<h1>Inscription</h1>
		<br />
		<form method="post" action="create_account.php">
			Identifiant:<br />
			<input type="text" name="login" <?= (isset(array_keys($_GET)[0]) AND (array_keys($_GET)[0] == "alreadyexist" OR array_keys($_GET)[0] == "error"))?"style='background-color: rgba(255, 0, 0, 0.5);' placeholder='Pseudo d&eacute;j&agrave; existant.'":"" ?>/>
			<br />
			Mot de passe:<br />
			<input type="password" name="passwd"  <?= (isset(array_keys($_GET)[0]) AND array_keys($_GET)[0] == "error")?"style='background-color: rgba(255, 0, 0, 0.5);'":"" ?>/>
			<br />
			<br />
			<input type="submit" class="effects" id="button" name="submit" value="Valider" />
		</form>
	</div>
	<?php include('./footer.html'); ?>
</body>
</html>