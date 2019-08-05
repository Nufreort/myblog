<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
		<link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    </head>
        
    <body>
		<header class="bloc">
			<?php 
			if (isset($_SESSION['id']) AND isset($_SESSION['first_name']))
			{
				echo '<p>Vous êtes connecté en tant que ' . $_SESSION['first_name'] . ' !</p><p>Votre id de session est :' . $_SESSION['id'] . '</p>';
			}
			
			?>
			<nav class="menu">
				<ul>
                    <li><a href="index.php">Accueil</a></li>
					<li><a href="index.php?action=signIn">Inscription</a></li>
					<li><a href="index.php?action=signUp">Connexion</a></li>
					<li><a href="index.php?action=listPosts">Le blog</a></li>
					<li><a href="index.php?action=leave">Deconnexion</a></li>
				</ul>
			</nav>
		</header>
        
		<?php
            require($page);
        ?>
		
		<footer class="bloc">
			<p>
				Suivez-moi sur mes réseaux !
<!--- <a href="https://www.linkedin.com/in/ldx/">
<img src="public/images/in.png" alt="icone linkedin" class="icone"/></a> -->
			</p>
			<p>
				<a class="waves-effect waves-light btn" href="#">Admin</a>
			</p>
		</footer>
    </body>
</html>


