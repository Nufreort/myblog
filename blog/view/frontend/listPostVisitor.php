<?php $title = 'Mon blog'; ?>


 <?php ob_start();?>
        <h1>Mon super blog !</h1>
        <p>Derniers billets du blog :</p>

        
        <?php
        while ($data = $posts->fetch())
        {
        ?>
        <div class="news">
            <h3>
                <?php echo htmlspecialchars($data['title']); ?>
                <em>le <?php echo $data['post_date']; ?></em>
            </h3>
            
            <p>
            <?php
            echo nl2br(htmlspecialchars($data['content']));
            ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
            </p>
        </div>
        <?php
        }
        $posts->closeCursor();
        ?>
<?php $content = ob_get_clean(); ?> 

<?php require('view/template.php'); ?>