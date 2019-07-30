<?php

function subUser($name, $first_name, $email, $password)
{
	$db = dbConnect();
	
	$member = $db->prepare('INSERT INTO user(name, first_name, email, password) VALUES(?, ?, ?, ?)');
	$dataUser = $member->execute(array($name, $first_name, $email, $password));
	
	return $dataUser;
}

function connexionUser($email)
{
	$db = dbConnect();
	
	$connexion = $db->prepare('SELECT id, name, first_name, email, password, role FROM user WHERE email = ?');
	$connexion->execute(array($email));
	$resultat = $connexion->fetch();
	
	return $resultat;
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
