<?php

$title = "Commentaires";
$subTitle = "liste de commentaires"; ?>

<?php ob_start(); ?>
<section class="postComments">
  <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
  <label class="btn btn-secondary active w-100">
    <input type="radio" name="options" id="option1" autocomplete="off" checked> Active
  </label>
  <label class="btn btn-secondary w-100">
    <input type="radio" name="options" id="option2" autocomplete="off"> Radio
  </label>

</div>
<div>

<?php

while ($comments = $showComments->fetch())
{
  $modalMsg = "Êtes vous sûr de vouloir supprimer ?";
?>

<?php if ($comments['report'] == 1): ?>
        <div class="reported commentContent">
<?php else:?>
        <div class="notReported commentContent">
<?php endif; ?>

          <p><a class="commentLink" href="index.php?action=post&amp;id=<?= $comments['post_id'] ?>"><strong><?= htmlspecialchars($comments['pseudo']) ?></strong> LE <?= $comments['comment_date_fr'] ?></a></p>
<?php if ($comments['report'] == 1): ?>
          <p class="reportingComment">Commentaire signalé <i class="fas fa-exclamation-triangle"></i></p>
<?php endif;?>







          <p><?= nl2br(htmlspecialchars($comments['comment'])) ?></p>
          <a class="btn btn-outline-success" href="index.php?action=editComment&amp;id=<?= $comments['c_id'] ?>&amp;post_id=allComments">Modifier</a>


          <a class="btn btn-outline-danger" data-href="index.php?action=deleteComment&amp;id=<?= $comments['c_id'] ?>&amp;post_id=commentList" href="index.php?action=deleteComment&amp;id=<?= $comments['c_id'] ?>&amp;post_id=commentList" data-toggle="modal" data-target="#modalShow">Supprimer</a>

          <?php if ($comments['report'] == 1): ?>
                              <a class="btn btn-outline-primary" href="index.php?action=reportComment&amp;id=<?= $comments['c_id'] ?>&amp;report=0&amp;post_id=commentList">Accepter</a>
          <?php endif;?>


        <hr>
        </div>


<?php
}
?>
</div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php');
