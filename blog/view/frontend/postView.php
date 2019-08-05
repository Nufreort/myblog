	<h1>
		Mon super blog !
	</h1>

	<p>
		<a href="index.php">Retour à la liste des billets</a>
	</p>

	<div class="news">
		<h3>
			<?php echo htmlspecialchars($post['title']); ?>
			<?php echo '- Ecrit par : ' . htmlspecialchars($post['writter_name']) . ' ' . htmlspecialchars($post['writter']); ?>
			<em> (le <?php echo $post['post_date']; ?>)</em>
		</h3>
		
		<p>
			<?= nl2br(htmlspecialchars($post['description'])) ?>
		</p>

		<p>
			<?= nl2br(htmlspecialchars($post['content'])) ?>
		</p>
	</div>

	<h2>Commentaires</h2>

	<?php
		while ($comment = $comments->fetch())
		{
	?>

	<p>
		<strong><?= htmlspecialchars($comment['writter_name']) ?> <?= htmlspecialchars($comment['writter']) ?></strong> le <?= $comment['comment_date'] ?>

		<?php
			if(htmlspecialchars($comment['writter_id']) == $_SESSION['id'])
			{
		?>
		
		(<a href="#">Modifer</a> / <a href="#">Supprimer</a>)';

		<?php
			}
		?>
	</p>

	<p>
		<?= nl2br(htmlspecialchars($comment['content'])) ?>
	</p>

	<?php
		}
	?>

	<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
		<div>
			<label for="author">Auteur :</label><br />
			<input type="text" id="author" name="author" />
		</div>
		
		<div>
			<label for="content">Commentaire :</label><br />
			<textarea id="content" name="content"></textarea>
		</div>
		
		<div>
			<input type="submit" value="Valider" />
		</div>
	</form>
