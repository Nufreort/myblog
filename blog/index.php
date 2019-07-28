<?php
require('controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
	
 // add a comment //
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
// end of add a comment

//add a user
	elseif ($_GET['action'] == 'addUser'){
		if (!empty($_POST['name']) && !empty($_POST['first_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2']))
		{
			if($_POST['password']==$_POST['password2'])
			{
				addUser($_POST['name'],$_POST['first_name'],$_POST['email'],$_POST['password']);
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
	
}
else {
    listPosts();
}