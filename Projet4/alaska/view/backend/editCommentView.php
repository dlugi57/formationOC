<?php
$title = 'Mon blog';
$subTitle = "subtitle";
ob_start(); ?>

<div class="container connexion">
  <div class="row justify-content-center">
    <div class="col-sm-10 col-md-10 col-lg-10">
      <div class="card">
        <div class="card-body">
          <form action="index.php?action=editComment&amp;id=<?= $comment['c_id'] ?><?php if (isset($_GET['post_id'])): echo "&amp;post_id=".$_GET['post_id']; endif; ?>" method="post">
            <div class="form-group">
              <p>Author: <?= htmlspecialchars($comment['pseudo']) ?></p>
            </div>
            <div class="form-group">
              <textarea id="comment" name="comment" class="form-control"><?= htmlspecialchars($comment['comment']) ?></textarea>
              <div class="invalid-feedback invalidContent">Formulaire mal ramplis</div>
            </div>
            <button class="btn btn-outline-warning btn-block" href="index.php?action=post&amp;id=<?= $comment['post_id'] ?>">Retour au billet</button>
            <button id="updateCommentBtn" type="submit" class="btn btn-outline-success btn-block">Enregistre</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require('view/frontend/template.php');
