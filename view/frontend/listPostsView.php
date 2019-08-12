	<h1>Mon super blog !!</h1>
    <p>Derniers billets du blog :</p>


    <?php
    	while ($data = $posts->fetch())
			{
	?>

	<div class="news">
		<h3>
			<?php echo htmlspecialchars($data['title']); ?>
			<?php echo '- Ecrit par : ' . htmlspecialchars($data['writter_name']) . ' ' . htmlspecialchars($data['writter']); ?>
			<em> (le <?php echo $data['post_date']; ?>)</em>
		</h3>

		<p>
            <?php echo nl2br(htmlspecialchars($data['description'])); ?>
			<br />
			<em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
		</p>
	</div>

	<?php
			}
			$posts->closeCursor();
	?>
