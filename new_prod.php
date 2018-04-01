<html>
	<head>
		<meta charset="utf-8" />
		<title>Formulaire</title>
		<style>
.centre
{
	text-align:center;
}
body
{
	background-color:#FA8258;
}
		</style>
	</head>
	<body >
		<form method="post" action="add_product.php">
			<fieldset>
				<div class="centre">
					<p>
		Nom chaussure :<input type="text" name="name" value="" />
		<br>
		<br>
		Prix :<input type="text" name="price" value="" />
		<br>
		<br>
		Colour :<input type="text" name="colour" value="" />
		<br>
		<br>
		Quantity :<input type="text" name="quantity" value="" /> 
		<br>
		<br>
		Sexe : 
		<SELECT name="sexe"> 
				<OPTION  value="M" /> Male </OPTION>
				<OPTION  value="F" /> Female </OPTION>
				<OPTION  value="A" /> Mixed </OPTION>
		</SELECT>

		<br>
		<br>
		Category : 
		<SELECT name="category">  <!-- regarder la base de donne et verifier en fonction du catalogue et creer. Include du code PHP-->

				<OPTION  value="Basket" /> Basket </OPTION>
				<OPTION  value="Soiree" /> Soiree </OPTION>
				<OPTION  value="Tong" /> Tong </OPTION>
				<OPTION  value="Ville" /> Ville </OPTION>
		</SELECT>
		<br>
		<br>

		Path_img :<input type="text" name="path_img" value="" />
		<br>
		<br>
		
<!--	<form method="post" enctype="multipart/form-data">
		 <div>
		   <label for="file">Sélectionner le fichier à envoyer</label>
			   <input type="file" id="file" name="file" multiple>
			 </div>
			 <div>
 		  <button>Envoyer</button>
	 </div>
</form>

-->


		<input type="submit" name="submit" value="OK" />
					</p>
				</div>
			</fieldset>
		</form>

<?PHP
	if ($_GET['addproduct'] && $_GET['addproduct'] == "ok")
	{
		echo "le produit a ete rajoute";
	}
	if ($_GET['addproduct'] && $_GET['addproduct'] == "fail")
	{
		echo "Erreur de saisie";
	}
?>

	</body>
</html>
