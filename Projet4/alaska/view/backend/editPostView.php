<?php $title = 'Mon blog';
$subTitle = "La vie c'est une longue histoire, mais un mauvais chapitre n'est pas nécessairement la fin du livre."; ?>

<?php ob_start(); ?>

<h1 class="text-center">Mon super blog !</h1>

<p class="navigator"><a class="btn btn-primary" href="index.php?action=post&amp;id=<?= $post['id'] ?>">Retour au billet</a></p>

<div class="comments">
  <h2 >Editer un post</h2>

  <form action="index.php?action=editPost&amp;id=<?= $post['id'] ?>" method="post">
    <div>
      <label for="author" class="col-sm-2 col-form-label">Title</label><br />
      <input type="text" id="author" name="postTitle" value="<?= $post['title'] ?>" class="form-control" />
    </div>
    <div>
      <label for="comment" class="col-sm-2 col-form-label">Content</label><br />
      <textarea id="comment" name="postContent" class="form-control"><?= $post['content'] ?></textarea>
    </div>
    <div>
      <input type="submit" class="btn btn-primary" />
    </div>
  </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
