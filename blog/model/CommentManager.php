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

		public function postComment($postId, $author, $content)
		{
			$db = dbConnect();

			$comments = $this->$db->prepare('INSERT INTO comment(post_id, author, content) VALUES(?, ?, ?)');
			$affectedLines = $comments->execute(array($postId, $author, $content));

			return $affectedLines;
		}

		public function editComment($commentId, $commentContent)
		{
			$db = dbConnect();

			$comments = $this->$db->preprare('UPDATE comment SET content=?, date= NOW() WHERE id=?');
			$editedLines = $comments->execute(array($commentId, $commentContent));

			return $editedLines;
		}
	}
