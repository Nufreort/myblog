<?php
require_once("model/ManagerGetData.php");

class CommentManager extends Manager
	{
		public function getComments($postId)
		{
			$db = $this->dbConnect();

			$comments = $db->prepare('SELECT comment.id, comment.author, comment.content, user.id AS writter_id, user.name AS writter_name, user.first_name AS writter, DATE_FORMAT(comment.date, \'%d/%m/%y à %Hh%imin%ss\') AS comment_date FROM comment INNER JOIN user ON user.id = comment.author WHERE post_id = ? ORDER BY comment_date DESC');
			$comments->execute(array($postId));

			return $comments;
		}

		public function postComment($content, $postId)
		{
			$db = $this->dbConnect();

			$comments = $db->prepare('INSERT INTO comment(author, content, post_id) VALUES(?, ?, ?)');
			$affectedLines = $comments->execute(array($_SESSION['id'], $content, $postId));

			return $affectedLines;
		}

		public function editComment($commentId, $commentContent)
		{
			$db = dbConnect();

			$comments = $this->$db->preprare('UPDATE comment SET content=?, date= NOW() WHERE id=?');
			$editedLines = $comments->execute(array($commentId, $commentContent));

			return $editedLines;
		}

		public function removeComment($commentId)
		{
			$db = $this->dbConnect();

			$comments = $db->prepare('DELETE FROM comment WHERE id=?');
			$removedLines = $comments->execute(array($commentId));

			return $removedLines;
		}
	}
