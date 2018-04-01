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
			<p>Sexe :<br /><br />
		       <input type="checkbox" name="num_1" id="num_1" /> <label for="num_1">Homme</label><br />
		       <input type="checkbox" name="num_2" id="num_2" /> <label for="num_2">Femme</label><br />
		   </p>
		</form>
		<form>
			<p>Prix :<br /><br />
		       <input type="checkbox" name="num_1" id="num_1" /> <label for="num_1"> - de 50$</label><br />
		       <input type="checkbox" name="num_2" id="num_2" /> <label for="num_2">50 a 200$</label><br />
		       <input type="checkbox" name="num_3" id="num_3" /> <label for="num_3">+ de 200$</label><br />
		   </p>
		</form>
	</div>


	<div class="central box" >
	<?php
	$prod = get_product();
	for($i = 0; isset($prod[$i]); $i++) 
	{
	?>
		<div class="article box"><img class="img_product" src="./logo.png">
		<form method="POST" action="panier.php">
			<div class="name"> <input type="text" name="name" value="<?= $prod[$i]['name']?>"></div>
			<div class="name"> <input type="text" name="sexe" value="<?= $prod[$i]['sexe']?>"></div>
			<div class="name"> <input type="text" name="price" value="<?= $prod[$i]['price']?>"></div>
			<input type="submit" name ="submit" value="OK" />	
		</form>
		</div>
		<?php
	}
?>
</div>
<?php include('./footer.html'); ?>
</body>
</html>
