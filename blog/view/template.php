<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
		<div class="menu">
			<ul>
				<li><a href="view/memberarea/signIn.php">Inscription</a></li>
				<li><a href="view/memberarea/signUp.php">Connexion</a></li>
			</ul>
		</div>
		<?php 
			if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
			{
				echo '<p>Bonjour ' . $_SESSION['pseudo'] . '</p>';
			}
		?>
        <?= $content ?>
    </body>
</html>