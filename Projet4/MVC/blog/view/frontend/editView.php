<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<h1 class="text-center">Mon super blog !</h1>

<p class="navigator"><a class="btn btn-primary" href="index.php?action=post&amp;id=<?= $comment['post_id'] ?>">Retour au billet</a></p>

<div class="comments">
  <h2 >Editer un commentaire</h2>

  <form action="index.php?action=editComment&amp;id=<?= $comment['id'] ?>" method="post">
    <div>
      <label for="author" class="col-sm-2 col-form-label">Auteur</label><br />
      <input type="text" id="author" name="author" value="<?= htmlspecialchars($comment['author']) ?>" class="form-control" />
    </div>
    <div>
      <label for="comment" class="col-sm-2 col-form-label">Commentaire</label><br />
      <textarea id="comment" name="comment" class="form-control"><?= htmlspecialchars($comment['comment']) ?></textarea>
    </div>
    <div>
      <input type="submit" class="btn btn-primary" />
    </div>
  </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
