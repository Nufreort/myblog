<?php
require_once("model/Manager.php");

class UserManager extends Manager
{
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

}
