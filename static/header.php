<header>
	<a href="http://192.168.99.100:8100/php_rush00/"><img id="logo" src="http://192.168.99.100:8100/php_rush00/img/logo.png"></a>
	<div id="login">
		<?= (isset($_SESSION["logged_on_user"]))?$_SESSION["logged_on_user"]:""; ?>
	</div>
	<div class="bandeau">
		<div class="perso">
			<div class="deroulant link effects">
					<a href="http://192.168.99.100:8100/php_rush00/account/panier.php">Panier</a>
			</div>
			<div class="deroulant link effects">
				<a href="http://192.168.99.100:8100/php_rush00/account">Compte</a>
				<div class="hidden" style="margin-top: 36px;">
					<div class="link"><a href="http://192.168.99.100:8100/php_rush00/account/create_account_page.php">Inscription</a></div>
					<div class="link"><a href="http://192.168.99.100:8100/php_rush00/account/login.php">Connexion</a></div>
					<div class="link"><a href="http://192.168.99.100:8100/php_rush00/account/admin.php">Administrateur</a></div>
				</div>
			</div>
		</div>
		<div class="menu">
			<?php
			for ($cat = 0; $cat < 3; $cat++)
			{
				?>
				<div class="deroulant left effects">
					<div class="link"><a href="http://192.168.99.100:8100/php_rush00/cat_1"><?= "CATEGORIE" ?></a></div>
					<div class="hidden linkmenu">
					<?php
					for ($souscat = 0; $souscat < 3; $souscat++)
					{
						?>
						<div class="link leftlink"><a href="http://192.168.99.100:8100/php_rush00/cat_1/sous_cat_1.php"><?= "SOUS_CAT" ?></a></div>
						<?php
					}
				 	?>
					</div>
				</div>
				<?php
			}
			?>
	</div>
</header>