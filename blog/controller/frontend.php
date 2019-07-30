<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listPosts()
{
	$postManager = new PostManager();
	
			$posts = $postManager->getPosts();
    		require('view/frontend/listPostsView.php');
    
}

function post()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();
	
	
			$post = $postManager->getPost($_GET['id']);
    $comments = $commentManager-> getComments($_GET['id']);

    require('view/frontend/postView.php');

	}

function postVisitor()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();
	
	
			$post = $postManager->getPost($_GET['id']);
    $comments = $commentManager-> getComments($_GET['id']);

	require('view/frontend/postViewVisitor.php');
}
    


function addComment($postId, $author, $content)
{
	$commentManager = new CommmentManager();
	
	$affectedLines = $commentManager->postComment($postId, $author, $content);
	
	if ($affectedLines === false){
		die('Impossible d\'ajouter le commentaire !');
	}
	else{
		header('Location: index.php?action=post&id=' .$postId);
	}
}

function addUser($name, $first_name, $email, $password)
{
	$userManager = new UserManager();
	
	$dataUser = $userManager->subUser($name, $first_name, $email, $password);
	
	if ($dataUser === false){
		die('Impossible de s\'inscrire ! <br /> Veuillez vérifier les informations saisies ou changer d\'email.');
	}
	else{
		header('Location: view/memberarea/signIn_done.php');
	}
}

function joinUser($email)
{
	$userManager = new UserManager();
	
	$userManager->connexionUser($email);
}