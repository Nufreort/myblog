<?php 
	session_start();

	$_SESSION = array();
	session_destroy(); 

	echo '<p>Vous avez été déconnecté.</p><p><a href="../../index.php">Retour à la page d\ \'accueil ?</ap>';
?>


