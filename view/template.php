<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
    		<link rel="stylesheet" href="public/css/style.css">
    		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="public/css/materialize.css"  media="screen,projection"/>
    </head>

    <body>
		<header class="bloc">
			<?php
			if (isset($_SESSION['id']) AND isset($_SESSION['first_name']))
			{
				echo '<p>Vous êtes connecté en tant que ' . $_SESSION['first_name'] . ' !</p><p>Votre id de session est :' . $_SESSION['id'] . '</p>';
			}

			?>
      <nav>
        <div class="nav-wrapper black nav-perso">
          <div class="container">
            <a href="index.php" class="brand-logo"><img class="responsive-img logo-v" src="public/images/logo ldx2.png"/></a>
          </div>

          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?action=listPosts">Le blog</a></li>
            <li><a href="index.php?action=signIn" class="waves-effect waves-light btn-small white black-text">Inscription</a></li>
  					<li><a href="index.php?action=signUp" class="waves-effect waves-light btn-small white black-text">Connexion</a></li>
  					<li><a href="index.php?action=leave" class="waves-effect waves-light btn-small red black-text"><i class="small material-icons">power_settings_new</i></a></li>
          </ul>
        </div>
      </nav>
		</header>

		<?php
            require($page);
    ?>

		<footer class="page-footer black">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Et si on gardait contact ?</h5>
                <p class="grey-text text-lighten-4">
					Suivez-moi sur mes réseaux !<a href="https://www.linkedin.com/in/ldx/">
					<img src="public/images/in.png" alt="icone linkedin" class="icone"/></a>
				</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2019 Copyright LDX Corp.
            <a class="waves-effect waves-light btn right" href="#">Admin</a>
            </div>
          </div>
        </footer>

		<script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>
