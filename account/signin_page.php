<html>
<head>
	<meta charset="utf-8" />
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="http://192.168.99.100:8100/php_rush00/style.css">
</head>
<?php include('../static/header.php'); ?>

<body>
	<form method="post" action="create.php">
		Identifiant: <input type="text" name="login"/>
		<br />
		Mot de passe: <input type="text" name="passwd" />
		<input type="submit" name="submit" value="OK" />
	</form>
</body>
</html>