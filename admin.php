<?php

function del_usr()
{
	if (isset($_GET["del_user"]) && $_GET["login"] && $_GET["login"] != "")
	{
		$content = file_get_contents("./private/passwd");
		$final = unserialize($content);
		 foreach ($final as $key => $value) {
		 	if ($value["login"] === $_GET["login"])
		 	{
		 		unset($final[$key]);
		 		break;
		 	}
		 }
		 $seria = serialize($final);
		 file_put_contents("./private/passwd", $seria);
		 header("Location: admin.php");
	}
}

function check_opt()
{
	if ((isset($_POST) && isset($_POST['opt']) && $_POST['opt'] === "users") || isset($_GET))
	{
		if (($content = file_get_contents("./private/passwd")) && ($unserialize = unserialize($content)))
		{
			?>
			<div class="tab_user box">
			<?php
			foreach ($unserialize as $key => $value) {
			?>
				<div class="line box">
					<?php echo $value['login'] ?>
					<form method="GET" action="admin.php">
						<input type="hidden" name="login" value="<?= $value['login']?>">
						<input type="submit" name="del_user" value="Delete">
					</form>
				</div>
				<?php
			}
			?>
			</div>
			<?php
			del_usr();
		}
	}
}
?>

<html>
<head>
	<meta charset="utf-8" />
	<title>Espace Administrateur</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
<?php
include('./header.php'); ?>
	<h1 class="title_adm">Section administrateur</h1>
	<form class="form_adm" method="POST" action="admin.php">
		<select name="opt">
			<option value="users">Gestion Utilisateurs</option>
			<option value="produits">Gestion des produits</option>
			<option value="categories">Gestion des catégories</option>
			<option value="commandes">Commandes passées</option>
		</select>
		<input type="submit" value="OK"/>
	</form>
	<?php
	check_opt();
	?>
<?php include('./footer.html'); ?>
</body>
</html>