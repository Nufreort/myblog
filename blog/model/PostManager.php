<?php
require_once("model/Manager.php");

class PostManager extends Manager
	{
		public function getPosts()
			{
				$db = $this->dbConnect();

				$req = $db->query('SELECT post.id, post.title, post.description, post.content, post.author, user.name AS writter_name, user.first_name AS writter, DATE_FORMAT(post.post_date, \'%d/%m/%y à %Hh%imin%ss\') AS post_date FROM post INNER JOIN user ON user.id = post.author ORDER BY post_date DESC LIMIT 0,5');

				return $req;
			}

		public function getPost($postId)
			{

				$db = $this->dbConnect();

				$req = $db->prepare('SELECT post.id, post.title, post.description, post.content, post.author, user.name AS writter_name, user.first_name AS writter, DATE_FORMAT(post.post_date, \'%d/%m/%y à %Hh%imin%ss\') AS post_date FROM post INNER JOIN user ON user.id = post.author WHERE post.id = ?');
				$req->execute(array($postId));
				$post= $req->fetch();

				return $post;
			}
	}