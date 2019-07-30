<?php $title = 'Mon blog'; ?>


 <?php ob_start();?>

        <h1>Accueil</h1>

        <p>Bienvenue sur mon blog de présentation</p>

		<p>Je suis Christopher LOUDOUX, <em>'le key partner'</em> dont votre projet a projet !</p>

        
		<p>Pour en apprendre plus sur moi : <a href="../../public/images/cv.php">Mon CV,</a> ou n'hésitez pas à me suivre via les réseaux sociaux <em>(cf contact en pied de page)</em> !</p>

		<form action="c.loudoux@gmail.com" method="post">
			<fieldset>
				<legend>Une question ? Envie d'échanger ? Laisser votre message :</legend>
				<div>
					<label for="contact">Nom / Prénom :</label><br />
					<input type="text" id="contact" name="contact" />
				</div>
				<div>
					<label for="email">Email de contact :</label><br /><input type="email" id="email" name="email" />
				</div>
				<label for="message">Votre message :</label><br />
				<textarea id="message" name="message"></textarea>
				<div>
					<input type="submit" value="Valider" />
				</div>
			</fieldset>
		</form>	

		

<?php $content = ob_get_clean(); ?> 

<?php require('template.php'); ?>