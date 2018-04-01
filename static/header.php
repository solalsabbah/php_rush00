<header>
	<?php
		session_start();
		function create_foldpasswd()
		{
			if (!file_exists("../private"))
			{
				$_SESSION["logged_on_user"] = "";
				mkdir("../private");
			}
			if (!file_exists("../private/passwd"))
			{
				file_put_contents("../private/passwd", NULL);
				$_SESSION["logged_on_user"] = "";
			}
		}
		create_foldpasswd();
	?>
	<a href="<?=_PATH_?>"><img id="logo" src="<?=_PATH_?>img/logo.png"></a>
	<div id="login">
		<?= (isset($_SESSION["logged_on_user"]))?$_SESSION["logged_on_user"]:""; ?>
	</div>
	<div class="bandeau">
		<div class="perso">
			<div class="deroulant link effects" onClick='location.href="<?=_PATH_?>account/panier.php"'>Panier</div>
			<div class="deroulant link effects">
				<a href= "<?=_PATH_?>account">Compte</a>
				<div class="hidden" style="margin-top: 36px;">
					<?php 
					if (!isset($_SESSION["logged_on_user"]) || ($_SESSION && isset($_SESSION["logged_on_user"]) && $_SESSION["logged_on_user"] === ""))
					{
					?>
					<div class="link" onClick='location.href="<?=_PATH_?>account/create_account_page.php"'>Inscription</div>
					<div class="link" onClick='location.href="<?=_PATH_?>account/login.php"'>Connexion</div>
					<?php 
					} 
					else
					{
					?>
					<div class="link" onClick='location.href="<?=_PATH_?>account/manage_account.php"'>Compte</div>
					<div class="link" onClick='location.href="<?=_PATH_?>account/logout.php"'>Déconnexion</div>
					<?php
					}
					?>
					<!-- <?php //if (isset($_SESSION["logged_on_user"]) && $_SESSION["logged_on_user"] === "admin") 
					{
					?> -->
					<div class="link" onClick='location.href="<?=_PATH_?>account/admin.php"'>Administrateur</div>
					<!-- <?php
					}
					?> -->
				</div>
			</div>
		</div>
		<div class="menu">
			<?php
			for ($cat = 0; $cat < 3; $cat++)
			{
				?>
				<div class="deroulant left effects">
					<div class="link" onClick='location.href="<?=_PATH_?>cat_1/"'><?= "CATEGORIE" ?></div>
					<div class="hidden linkmenu">
					<?php
					for ($souscat = 0; $souscat < 3; $souscat++)
					{
						?>
						<div class="link leftlink" onClick='location.href="<?=_PATH_?>cat_1/sous_cat_1.php"'><?= "SOUS_CAT" ?></div>
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