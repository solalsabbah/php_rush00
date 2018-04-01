<?PHP include('./config.php');

$db = "rush00";

$serv = mysqli_connect($server, $SQLlogin, $SQLpass); // connecte au serveur

if (!$serv)
{
	printf("Echec de la connexion : %s\n", mysqli_connect_error());
	exit();
}

//printf("Information sur le serveur : %s\n", mysqli_get_host_info($serv));



///////////// need to display the whole table Products  ///////////////////////////

if (!mysqli_select_db($serv, "rush00")) // Connect to my database
{
	echo "Connected to table";
}

$sql_table = "SELECT * FROM PRODUCTS";

$result = mysqli_query($serv, $sql_table)or die(mysqli_error($serv));



if (isset($_GET) && isset($_GET['answer']) && $_GET['answer'] == "ok")
	echo "Le produit a ete modifie";
elseif (isset($_GET) && isset($_GET['answer']) && $_GET['answer'] == "fail")
	echo "Le produit n'a pas pu etre modifie";
?>

<html>
<head>
	<title>Modification du produit</title>
	<link rel="stylesheet" type="text/css" href="./style.css">

</head>
<body>
<?php include('./header.php'); ?>


<table>
<tr><th></th><th>id_product</th><th>name</th><th>price</th><th>colour</th><th>quantity</th><th>sexe</th><th>category</th></tr>
<?PHP
while($row = mysqli_fetch_array($result)) 
{
	$id_product = $row['id_product'];
	$name = $row['name'];
	$price = $row['price'];
	$colour = $row['colour'];
	$quantity = $row['quantity'];
	$sexe = $row['sexe'];
	$category = $row['category'];
?>
	<tr>
		<form method="POST" action="modify_product.php">
			<td style='width: 200px;'>
			<td> <input type="text" name ="id_product" value="<?="$id_product"?>"></td> 
			<td><input type="text" name ="name" value="<?="$name"?>"></td>
			<td><input type="text" name ="price" value="<?="$price"?>"></td>
			<td><input type="text" name ="colour" value="<?="$colour"?>"></td>
			<td><input type="text" name ="quantity" value="<?="$quantity"?>"></td>
			<td><input type="text" name ="sexe" value="<?="$sexe"?>"></td>
			<td><input type="text" name ="category" value="<?="$category"?>"></td>
			<td><input type="hidden" name ="id_product" value="<?="$id_product"?>"></td>
			<td><input type="submit" name="submit" value="OK"/></td>
		</form>
	</tr>

<?PHP
} 

?>
</table>
</body>
</html>
<?PHP

if (preg_match("#^[0-9]{1,8}$#", $_POST['id_product']) && $_POST['submit'] == "OK")
{

	if (($_POST['name']) && preg_match("#^[0-9]([0-9]?){3}?$#", $_POST['price']) && (preg_match("#^[0-9]([0-9]?){3}?$#", $_POST['quantity'])) && preg_match("#^[a-zA-Z, ]*$#", $_POST['colour']) && (preg_match("#[MFA]#", $_POST['sexe'])))
	{

		$sql = "UPDATE products SET name = \"{$_POST['name']}\", price = \"{$_POST['price']}\", colour = \"{$_POST['colour']}\", quantity = \"{$_POST['quantity']}\", sexe = \"{$_POST['sexe']}\", category = \"{$_POST['category']}\" WHERE id_product = \"{$_POST['id_product']}\"";

		$modif = mysqli_query($serv, $sql); // apply modif
		header('location: modify_product.php?answer=ok');

		if($modif)
			echo "La modification des donnees a ete correctement effectuee.\n";
	}
	else
		header('location: modify_product.php?answer=fail');
}
?>
