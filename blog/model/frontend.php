<?php

function getPosts()
{
	$db = dbConnect();

	$req = $db->query('SELECT id, title, description, content, DATE_FORMAT(post_date, \'%d/%m/%y à %Hh%imin%ss\') AS post_date FROM post ORDER BY post_date DESC LIMIT 0,5');

	return $req;
}

function getPost($postId)
{

	$db = dbConnect();

	$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(post_date, \'%d/%m/%y à %Hh%imin%ss\') AS post_date FROM post WHERE id = ?');
	$req->execute(array($postId));
	$post= $req->fetch();

	return $post;
}


function getComments($postId)
{
	$db = dbConnect();
	
	$comments = $db->prepare('SELECT id, title, author, content, DATE_FORMAT(date, \'%d/%m/%y à %Hh%imin%ss\') AS comment_date FROM comment WHERE id = ? ORDER BY date DESC');
	$comments->execute(array($postId));


	return $comments;
}

function dbConnect()
{
	
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=myblog;charset=utf8','root','');

		return $db;
	}

	catch(Exception $e)
	{
		die('Erreur : '. $e->getMessage());
	}
}



?>