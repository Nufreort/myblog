<?php $title = 'Mon blog'; ?>


<?php ob_start(); ?>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['post_date'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
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

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>






