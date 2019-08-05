<?php
session_start(); ?>

<?php $title = 'Mon blog'; ?>


<?php ob_start(); ?>
        <h1>Mon super blog !</h1>
        <p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>

        
        <h2>Modifier votre Commentaire</h2>


<form action="../../index.php?action=editComment" method="post">
	<div>
		<label for="author">Auteur :</label><br />
		<input type="text" id="author" name="author" />
	</div>
	<div>
		<label for="content">Commentaire :</label><br />
		<textarea id="content" name="content"></textarea>
	</div>
	<div>
		<input type="submit" value="Valider" />
	</div>
</form>	

<?php $content = ob_get_clean(); ?>
<?php require('../../view/template.php'); ?>






