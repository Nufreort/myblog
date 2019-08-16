<div class="container">
  <p>
      <a href="index.php">Retour à la liste des billets</a>
  </p>


  <div class="card">
    <div class=card-title>
      <h3>
          <?= htmlspecialchars($post['title']) ?>
          <em>le <?= $post['post_date'] ?></em>
      </h3>
    </div>
    <div class="card-content">
      <p>
          <?= nl2br(htmlspecialchars($post['content'])) ?>
      </p>
    </div>
  </div>


  <h2>
      Commentaires
  </h2>

  <?php
      while ($comment = $comments->fetch())
      {
  ?>
  <div class="card">
      <div class="card-content">
      <p>
          <strong>
              <?= htmlspecialchars($comment['writter']) ?>
          </strong>
          le <?= $comment['comment_date'] ?>
      </p>

      <p>
          <?= nl2br(htmlspecialchars($comment['content'])) ?>
      </p>
      </div>
  </div>
  <?php
    }
  ?>

</div>
