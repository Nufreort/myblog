<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
		<header class="bloc">
			<?php 
			if (isset($_SESSION['id']) AND isset($_SESSION['first_name']))
			{
				echo '<p>Vous êtes connecté en tant que ' . $_SESSION['first_name'] . ' !</p>';
			}
			?>
			<nav class="menu">
				<ul>
					<li><a href="view/memberarea/signIn.php">Inscription</a></li>
					<li><a href="view/memberarea/signUp.php">Connexion</a></li>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="index.php">Le blog</a></li>
					<li><a href="view/memberarea/leave.php">Deconnexion</a></li>
				</ul>
			</nav>
		</header>
		
		
        
		<?= $content ?>
		
		<footer class="bloc">
			<p>Suivez-moi sur mes réseaux !<a href="https://www.linkedin.com/in/ldx/"><img scr="in.png" alt="icone linkedin"/></a></p>
			<p><a href="#">Admin</a></p>
		</footer>
		
    </body>
</html>