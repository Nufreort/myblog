<?php $title = 'Mon blog'; ?>


<?php ob_start(); ?>
        <p>Votre compte a bien été créé !</p>
		<p>Veuillez vous connecter : <a href="signUp.php">Connexion</a></p>


<?php $content = ob_get_clean(); ?>
<?php require('../template.php'); ?>



