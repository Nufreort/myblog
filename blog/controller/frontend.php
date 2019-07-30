<?php

require('model/frontend.php');

function listPosts()
{
    $posts = getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $content)
{
	$affectedLines = postComment($postId, $author, $content);
	
	if ($affectedLines === false){
		die('Impossible d\'ajouter le commentaire !');
	}
	else{
		header('Location: index.php?action=post&id=' .$postId);
	}
}

function addUser($name, $first_name, $email, $password)
{
	$dataUser = subUser($name, $first_name, $email, $password);
	
	if ($dataUser === false){
		die('Impossible de s\'inscrire ! <br /> Veuillez vérifier les informations saisies ou changer d\'email.');
	}
	else{
		header('Location: view/memberarea/signIn_done.php');
	}
}

function joinUser($email)
{
	connexionUser($email);
}