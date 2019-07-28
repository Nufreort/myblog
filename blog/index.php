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
}
else {
    listPosts();
}