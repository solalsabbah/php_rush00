<?PHP include('admin/config.php');

$db = "rush00";

$serv = mysqli_connect(null, $SQLlogin, $SQLpass, null, 0, '/Users/ssabbah/goinfre/mysql/tmp/mysql.sock'); // connecte au serveur

if (!$serv)
{
	printf("Echec de la connexion : %s\n", mysqli_connect_error());
	exit();
}

//printf("Information sur le serveur : %s\n", mysqli_get_host_info($serv));

//$name = mysql_real_escape_string($_POST['name']); // verifie que le produit n est pas une injection SQL


$ok = 0;
if ($_POST['submit'] == "OK") 
{

	if (($_POST['name']) && preg_match("#^[0-9]([0-9]?){3}?$#", $_POST['price']) && (preg_match("#^[0-9]([0-9]?){3}?$#", $_POST['quantity'])) && preg_match("#^[a-zA-Z, ]*$#", $_POST['colour']) && (preg_match("#[MFA]#", $_POST['sexe']))) 
	{
		$ok = 1;
		header('location: new_prod.php?addproduct=ok');
	}
	else
		header('location: new_prod.php?addproduct=fail');
}

/*
if ($ok == 1)
{
	/////  ADD DATA TO THE CSV ////  if the product is ok 

	$new_prod = array($_POST['name'], $_POST['price'], $_POST['colour'], $_POST['quantity'], $_POST['sexe'], $_POST['path_img']);

	if (($handle = fopen("catalogue.csv", "a")) !== "FALSE")
	{
		fputcsv($handle, $new_prod);
		//	echo "csv added\n";
	}

	/////////////////////////////
}*/


///// ADD DATA TO SQL TABLLE ////////

if (!mysqli_select_db($serv, "rush00")) // Connect to my database
{
	echo "Connected to table";
}

if ($ok == 1)
{
	$val = "INSERT INTO PRODUCTS(name, price, colour, quantity, sexe, category, path_img)
		VALUES(\"{$_POST['name']}\", \"{$_POST['price']}\", \"{$_POST['colour']}\", \"{$_POST['quantity']}\", \"{$_POST['sexe']}\", \"{$_POST['category']}\", \"{$_POST['path_img']}\")";

	if (mysqli_query($serv, $val)) 
	{
		echo "New record created successfully";
	}
	else 
	{
		echo "The Error is: " . mysqli_error($serv);
	}
}
?>
