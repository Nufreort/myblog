<?php $title = 'Mon blog'; ?>


<?php ob_start(); ?>
        <h1>Ne soyez pas timide, inscrivez-nous !</h1>
        <p><a href="../../index.php">Retour à la page d'accueil</a></p>

<form class="sub" action="../../index.php?action=addUser" method="post">
	<div>
		<label for="name">Nom :</label><br />
		<input type="text" id="name" name="name" />
	</div>
	<div>
		<label for="first_name">Prénom :</label><br />
		<input type="text" id="first_name" name="first_name" />
	</div>
	<div>
		<label for="email">Email :</label><br />
		<input type="email" id="email" name="email" />
	</div>
	<div>
		<label for="password">Mot de passe :</label><br />
		<input type="password" id="password" name="password" />
	</div>
	<div>
		<label for="password2">Retapez votre mot de passe :</label><br />
		<input type="password" id="password2" name="password2" />
	</div>
	<div>
		<input type="submit" value="Valider" />
	</div>
</form>
<?php $content = ob_get_clean(); ?>
<?php require('../template.php'); ?>



