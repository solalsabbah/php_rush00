<?php

include('config.php');

$db = "rush00";

$serv = mysqli_connect($server, $SQLlogin, $SQLpass); // connecte au serveur

if (!$serv) 
{
	printf("Echec de la connexion : %s\n", mysqli_connect_error());
	exit();
}

printf("Information sur le serveur : %s\n", mysqli_get_host_info($serv));


if (!mysqli_select_db($serv, $db)) // use select to verify existence of DB
{
	$sql = "CREATE DATABASE $db"; // create database "$db"
	if (mysqli_query($serv, $sql)){
		echo "Database created successfully\n";
	} else {
		echo "Error creating database: " . mysqli_error($serv);
	}
}


mysqli_select_db($serv, "$db"); // use select to create a database


if ($result = mysqli_query($serv, "SELECT DATABASE()")) 
{
	$row = mysqli_fetch_row($result);
	printf("La base de données courante est %s.\n", $row[0]);
	mysqli_free_result($result);
}

/// ELEMENTS PRODUITS /// 

$products = "CREATE TABLE PRODUCTS( id_product INT NOT NULL AUTO_INCREMENT, name VARCHAR(255) NOT NULL, price INT NOT NULL, colour VARCHAR(255) NOT NULL, quantity INT NOT NULL, sexe ENUM('M', 'F', 'A') NOT NULL, category VARCHAR(255) NOT NULL, path_img VARCHAR(50), PRIMARY KEY (id_product));";


if(mysqli_query($serv, $products)){  
	echo "Table created successfully\n";   // need to change table name to create a new table
} else {  
	echo "Table is not created\n";  
} 


/////////// OPEN MY CATALOGUE////////
/// AND PUT CONENTS IN data array ///

$handle = fopen("catalogue.csv", "r");

$header = fgetcsv($handle);

$data = array();
while ($row = fgetcsv($handle)) 
{
	$arr = array();
	foreach ($header as $i => $col)
		$arr[$col] = $row[$i];
	print_r($arr);
	//	echo $arr['id_client']."\n";
	$val = "INSERT INTO PRODUCTS(name, price, colour, quantity, sexe, category, path_img)
		VALUES(\"{$arr['name']}\", \"{$arr['price']}\", \"{$arr['colour']}\",  \"{$arr['quantity']}\", \"{$arr['sexe']}\", \"{$arr['category']}\", \"{$arr['path_img']}\")";

	if (mysqli_query($serv, $val)) {
		echo "New record created successfully";
	} 
	else {
		echo "Error: " . mysqli_error($serv);
	}
	$data[] = $arr;
}
////////////// CREATE PANIER /////////////////
$db = "rush00";

mysqli_select_db($serv, $db);

$cont = "CREATE TABLE PANIER( id_product INT NOT NULL AUTO_INCREMENT, name VARCHAR(255) NOT NULL, price INT NOT NULL, quantity INT NOT NULL, sexe ENUM('M', 'F', 'A') NOT NULL, PRIMARY KEY (id_product));";


	if(mysqli_query($serv, $cont)){
		echo "Table created successfully\n";
	} else {
		echo "Table is not created\n";
	}
?>
