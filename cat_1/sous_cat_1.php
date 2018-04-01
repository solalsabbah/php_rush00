<html>
<head>
	<meta charset="utf-8" />
	<title>Site e-Commerce</title>
	<link rel="stylesheet" type="text/css" href="http://192.168.99.100:8100/php_rush00/style.css">
</head>
<body>
<?php
define("_PATH_", "../");
include(_PATH_.'/static/header.php'); ?>
<div class="main">
	<div class="criteria box">
		<form>
			<p>Critères :<br /><br />
		       <input type="checkbox" name="num_1" id="num_1" /> <label for="num_1">Num_1</label><br />
		       <input type="checkbox" name="num_2" id="num_2" /> <label for="num_2">Num_2</label><br />
		       <input type="checkbox" name="num_3" id="num_3" /> <label for="num_3">Num_3</label><br />
		       <input type="checkbox" name="num_4" id="num_4" /> <label for="num_4">Num_4</label>
		   </p>
		</form>
		<form>
			<p>Critères2 :<br /><br />
		       <input type="checkbox" name="num_1" id="num_1" /> <label for="num_1">Num_1</label><br />
		       <input type="checkbox" name="num_2" id="num_2" /> <label for="num_2">Num_2</label><br />
		       <input type="checkbox" name="num_3" id="num_3" /> <label for="num_3">Num_3</label><br />
		       <input type="checkbox" name="num_4" id="num_4" /> <label for="num_4">Num_4</label>
		   </p>
		</form>
	</div>


	<div class="central box">
	<?php
	$i = 0;
	while ($i < 100) // Ici, inserer la base de donnees des produits selon les criteres (Remplacer le i par l'index des produits)
	{
		?>
		<div class="article box"><img class="img_product" src="../img/logo.png">
			<div class="name"><?php echo "Article"?></div>
			<div class="price"><?php echo "50$"?></div>
		</div>
		<?php
		$i++;
	}
?>
</div>
<?php include('../static/footer.html'); ?>
</body>
</html>