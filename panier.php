<?PHP include('config.php');

$serv = mysqli_connect($server, $SQLlogin, $SQLpass); // connecte au serveur

if (!$serv)
{
	printf("Echec de la connexion : %s\n", mysqli_connect_error());
	exit();
}

mysqli_select_db($serv, "rush00"); // use select to verify existence of DB

if(isset($_POST['submit']) && $_POST['submit'] == "OK")
{
	$q = 1;
	$query = "INSERT INTO PANIER(name, price, quantity, sexe)
		VALUES(\"{$_POST['name']}\", \"{$_POST['price']}\", $q, \"{$_POST['sexe']}\")";

mysqli_query($serv, $query);
}

$sql_table = "SELECT * FROM PANIER";

$result = mysqli_query($serv, $sql_table)or die(mysqli_error($serv));


?>

<html>
<head>
	<meta charset="utf-8" />
	<title>Panier</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
<?php
include('./header.php'); ?>
	<div class="box log">
		<h1>Panier</h1>
	</div>
	<?php include('./footer.html'); ?>

<table>
<tr><th></th><th>name</th><th>price</th><th>sexe</th></tr>
<?PHP
$total = 0;
while($row = mysqli_fetch_array($result))
{
	$name = $row['name'];
	$price = $row['price'];
	$sexe = $row['sexe'];
	$total = $total + $price; 
?>
	<tr>
		<form method="POST" action="modify_product.php">
			<td style='width: 200px;'>
			<td><input type="text" name ="name" value="<?="$name"?>"></td>
			<td><input type="text" name ="price" value="<?="$price"?>"></td>
			<td><input type="text" name ="sexe" value="<?="$sexe"?>"></td>
		</form>
	</tr>

<?PHP
}

?>
</table>


<p><b>The total is : <?=$total?></b></p>









</body>
</html>
