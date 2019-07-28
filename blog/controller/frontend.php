<?php

require('model/frontend.php');

function listPosts()
{
    $posts = getPosts();

    require('view/listPostsView.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('view/postView.php');
}

function addComment($postId, $author, $comment)
{
	$affectedLines = PostComment($postId, $author, $comment);
	
	if ($affectedLines === false){
		die('Impossible d\'ajouter le commentaire !');
	}
	else{
		header('Location: index.php?action=post&id=' .$postId);
	}
}