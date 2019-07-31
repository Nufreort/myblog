<?php
session_start(); ?>
<?php $title = 'Mon blog'; ?>


<?php ob_start(); ?>
        <h1>Page de connexion</h1>
        <p><a href="../../index.php">Retour à la page d'accueil</a></p>

<form class="connexion" action="../../index.php?action=joinUser" method="post">
	<div>
		<label for="email">Email :</label><br />
		<input type="text" id="email" name="email" />
	</div>
	<div>
		<label for="password">Mot de passe :</label><br />
		<input type="password" id="password" name="password" />
	</div>
	<div>
		<input type="submit" value="Se connecter" />
	</div>
</form>
<?php $content = ob_get_clean(); ?>
<?php require('../template.php'); ?>



