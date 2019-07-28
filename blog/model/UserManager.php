<?php

function addUser()
{
	$db = dbConnect();
	
	$member = $db->prepare('INSERT INTO user(name, first_name, email, password, role, sub_date) VALUES(?, ?, ?, ?, membre, NOW())');
	$dataUser = $member->execute(array($name, $first_name, $email, $password));
	
	return $dataUser;
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
