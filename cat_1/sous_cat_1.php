<html>
<head>
	<meta charset="utf-8" />
	<title>Site e-Commerce</title>
	<link rel="stylesheet" type="text/css" href="http://192.168.99.100:8100/php_rush00/style.css">
</head>
<body>
<?php include('../static/header.php'); ?>
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
		<div class="article"><img class="img_product" src="../img/logo.png">
			<div class="name">Article 1</div>
			<div class="price">50$</div>
		</div>
		<div class="article">Article 1</div>
		<div class="article">Article 1</div>
		<div class="article">Article 1</div>
		<div class="article">Article 1</div>

	</div>
</div>
<?php include('../static/footer.html'); ?>
</body>
</html>