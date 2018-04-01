<html>
<head>
	<meta charset="utf-8" />
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
<?php
include('./header.php'); ?>
	<div class="box log">
		<h1>Connexion</h1>
		<br />
		<form method="post" action="login_check.php">
			Identifiant:<br />
			<input type="text" name="login" <?= (isset(array_keys($_GET)[0]) AND (array_keys($_GET)[0] == "erreurconnexion" OR array_keys($_GET)[0] == "error"))?"style='background-color: rgba(255, 0, 0, 0.5);' placeholder='Erreur de Connexion.'":"" ?>/>
			<br />
			Mot de passe:<br />
			<input type="password" class="effects" name="passwd" />
			<br />
			<br />
			<input type="submit" class="effects" id="button" name="submit" value="Valider" />
		</form>
	</div>
	<?php include('./footer.html'); ?>
</body>
</html>
