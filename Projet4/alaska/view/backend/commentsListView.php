<?php

$title = "Commentaires";
$subTitle = "subtitle"; ?>

<?php ob_start(); ?>

<div>

<?php

while ($comments = $showComments->fetch())
{
?>
<div class="">
  <p>
    <a href="index.php?action=post&amp;id=<?= $comments['post_id'] ?>"><strong><?= htmlspecialchars($comments['pseudo']) ?></strong> le <?= $comments['comment_date_fr'] ?>repport -><?= nl2br(htmlspecialchars($comments['report']));?>
    </a>
  </p>
  <p><?= nl2br(htmlspecialchars($comments['comment'])) ?></p>
</div>
<?php
}
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php');
