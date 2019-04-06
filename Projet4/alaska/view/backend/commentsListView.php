<?php

$title = "Commentaires";
$subTitle = "subtitle"; ?>

<?php ob_start(); ?>

<div>

<?php

while ($comments = $showComments->fetch())
{
?>
<?php if ($comments['report'] == 1): ?>
        <div class="reported">
<?php else:?>
        <div class="notReported">
<?php endif; ?>


          <p>
            <a href="index.php?action=post&amp;id=<?= $comments['post_id'] ?>"><strong><?= htmlspecialchars($comments['pseudo']) ?></strong> le <?= $comments['comment_date_fr'] ?>repport -><?= nl2br(htmlspecialchars($comments['report']));?>
            </a>
            <a href="index.php?action=editComment&amp;id=<?= $comments['c_id'] ?>&amp;post_id=allComments">modifier</a>
            <a href="index.php?action=deleteComment&amp;id=<?= $comments['c_id'] ?>&amp;post_id=commentList">supprimer</a>
            <a href="index.php?action=reportComment&amp;id=<?= $comments['c_id'] ?>&amp;report=0&amp;post_id=commentList">Unsignaler</a>

          </p>
          <p><?= nl2br(htmlspecialchars($comments['comment'])) ?></p>
        </div>


<?php
}
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php');
