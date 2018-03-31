<?PHP include('admin/config.php');

$db = "rush00";

$serv = mysqli_connect(null, $SQLlogin, $SQLpass, null, 0, '/Users/ssabbah/goinfre/mysql/tmp/mysql.sock'); // connecte au serveur

if (!$serv)
{
	printf("Echec de la connexion : %s\n", mysqli_connect_error());
	exit();
}

printf("Information sur le serveur : %s\n", mysqli_get_host_info($serv));

VALUES(\"{$_SESSION['name']}\", \"{$_SESSION['price']}\", \"{$_SESSION['colour']}\",  \"{$_SESSION['quantity']}\", \"{$_SESSION['sexe']}\", \"{$_SESSION['path_img']}\")"; // add a new produt // replace _SESSION par $_SESSION[']


$valide = 0
while($valide = 0);
{
	if ($_SESSION['name'] && preg_match("^[0-9]([0-9]?){3}?$", $_SESSION['price']) && preg_match("^[0-9]([0-9]?){3}?$", $_SESSION['price']) && preg_match("^[a-zA-Z,]$", $_SESSION['quantity']) && preg_match("[MFA]", $_SESSION['sexe'])file_exists($_SESSION['path_img'])
	$valide = 1;
}

?>
