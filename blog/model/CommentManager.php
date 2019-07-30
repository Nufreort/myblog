<?php
class CommentManager
{
	public function getComments($postId)
	{
		$db = $this->dbConnect();

		$comments = $db->prepare('SELECT id, author, content, DATE_FORMAT(date, \'%d/%m/%y à %Hh%imin%ss\') AS comment_date FROM comment WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));


		return $comments;
	}

	public function postComment($postId, $author, $content)
	{
		$db = dbConnect();

		$comments = $this->$db->prepare('INSERT INTO comment(post_id, author, content) VALUES(?, ?, ?)');
		$affectedLines = $comments->execute(array($postId, $author, $content));

		return $affectedLines;
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
}
