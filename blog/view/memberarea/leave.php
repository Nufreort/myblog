<?php $title = 'Mon blog'; ?>


<?php ob_start(); ?>

	<?php session_destroy(); ?>

	<p>Vous avez été déconnecté !</p>
	<p><a href="../../index.php">Retour à la page d'accueil</a></p>


<?php $content = ob_get_clean(); ?>
<?php require('../template.php'); ?>



