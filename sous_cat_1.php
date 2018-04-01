<?PHP
function get_product() {
include("config.php");

	$db = "rush00";

	$serv = mysqli_connect($server, $SQLlogin, $SQLpass);

	$cat = array();
	if (mysqli_select_db($serv, "rush00")) // Connect to my database
	{

		$sql_table = "SELECT * FROM PRODUCTS WHERE category=\"{$_GET['category']}\"";
		$result = mysqli_query($serv, $sql_table);

		while ($row = (mysqli_fetch_assoc($result)))
		{
			$cat[] = $row;
		}
	}
	return ($cat);
}
?>

<html>
<head>
	<meta charset="utf-8" />
	<title>Site e-Commerce</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
<?php
include('./header.php'); ?>
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
	$prod = get_product();
	for($i = 0; isset($prod[$i]); $i++) // Ici, inserer la base de donnees des produits selon les criteres (Remplacer le i par l'index des produits)
	{
		?>
		<div class="article box"><img class="img_product" src="./logo.png">
			<div class="name"><?= $prod[$i]['name'] ?></div>
			<div class="name"><?= $prod[$i]['price'] ?></div>
			<div class="name"><?= $prod[$i]['sexe'] ?></div>
		</div>
		<?php
	}
?>
</div>
<?php include('./footer.html'); ?>
</body>
</html>
