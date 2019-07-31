<?php
session_start(); ?>

<?php
require('controller/frontend.php');

//--- index page

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
	
//-- get the post
    elseif ($_GET['action'] == 'post'){
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (isset($_SESSION['id'])){
					post();
				}
				else{
					postVisitor();
				}		
				}
				
            
		   }

 // ------------------ COMMENTS ----------//
		
	
 // add a comment
	elseif ($_GET['action'] == 'addComment'){
		if (isset($_GET['id']) && $_GET['id']> 0){
			if (!empty($_POST['author']) && !empty($_POST['content'])){
				addComment($_GET['id'], $_POST['author'], $_POST['content']);
			}
			else
			{
				echo 'Erreur : tous les champs ne sompt pas remplis !' ;
			}
		}
		else {
			echo 'Erreur : aucun identifiant de billet envoyé';
		}
	}
// update a comment

	elseif ($_GET['action'] == 'edit'){
		header('Location:view/commentManager/editComment.php');
	}
	
// ------------------- USER ----------------- //

//add a user
	elseif ($_GET['action'] == 'addUser'){
		if (!empty($_POST['name']) && !empty($_POST['first_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2']))
		{
			if($_POST['password']==$_POST['password2'])
			{
				
				$pass_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
				addUser($_POST['name'],$_POST['first_name'],$_POST['email'],$pass_hash);
			}
			else
			{
				echo 'Les mots de passe sont différents.';
			}
		}
		else{
			echo 'Tous les champs ne sont pas remplis.';
		}
	}

//end of add a user
	
// user connexion

	elseif($_GET['action'] == 'joinUser'){
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		
$db = new PDO('mysql:host=localhost;dbname=myblog;charset=utf8','root','');

$connexion = $db->prepare('SELECT id, name, first_name, email, password, role FROM user WHERE email = ?');
$connexion->execute(array($email));
$resultat = $connexion->fetch();
		
		
		$isPasswordCorrect = password_verify($password, $resultat['password']);
		
		if (!$resultat['password'])
		{
			
			echo 'Mauvais identifiant ou mot de passe !';
		}
		else
		{
			if($isPasswordCorrect){
				session_start();
				$_SESSION['id'] = $resultat['id'];
				$_SESSION['name'] = $resultat['name'];
				$_SESSION['first_name'] = $resultat['first_name'];
				$_SESSION['email'] = $resultat['email'];
			
			header('Location:view/memberarea/signUp_done.php');
			}
			else{
				echo 'Mauvais identifiant ou mot de passe ! (erreur 2)';
			}
		}
	}
// end of user connexion
	
}
else {
    header('Location:view/presentation.php');
}