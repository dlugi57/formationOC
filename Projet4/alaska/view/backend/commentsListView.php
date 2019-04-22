<?php
$title = "Commentaires";
$subTitle = "liste de commentaires";
ob_start(); ?>
<section class="postComments">
  <div id="radioComments" class="btn-group btn-group-toggle w-100" data-toggle="buttons">
    <label id="commentsReported" class="btn btn-outline-danger w-100">
      <input type="radio" name="options"  autocomplete="off" > SIGNALE
    </label>
    <label id="commentsAll" class="btn btn-outline-success active w-100">
      <input type="radio" name="options" autocomplete="off" checked> TOUS
    </label>
    <label id="commentsNotReported" class="btn btn-outline-primary w-100">
      <input type="radio" name="options"  autocomplete="off" >NON SIGNALE
    </label>
  </div>
  <hr>
  <div>
    <?php
    while ($comments = $showComments->fetch())
    {
      //send message to modal
      $modalMsg = "Êtes vous sûr de vouloir supprimer ?";
      //change class to show different types of comments in list
      if ($comments['report'] == 1):
      ?>
        <div class="reported commentContent">
      <?php
      else:
      ?>
        <div class="notReported commentContent">
      <?php
      endif;
      ?>
        <p><a class="commentLink" href="index.php?action=post&amp;id=<?= $comments['post_id'] ?>"><strong><?= htmlspecialchars($comments['pseudo']) ?></strong> LE <?= $comments['comment_date_fr'] ?></a></p>
        <?php
        //if reported show button
        if ($comments['report'] == 1):
        ?>
          <p class="reportingComment">Commentaire signalé <i class="fas fa-exclamation-triangle"></i></p>
        <?php
        endif;
        ?>
        <p><?= nl2br(htmlspecialchars($comments['comment'])) ?></p>

        <a class="btn btn-outline-success" href="index.php?action=editComment&amp;id=<?= $comments['c_id'] ?>&amp;post_id=allComments">Modifier</a>

        <a class="btn btn-outline-danger" data-href="index.php?action=deleteComment&amp;id=<?= $comments['c_id'] ?>&amp;post_id=commentList" href="index.php?action=deleteComment&amp;id=<?= $comments['c_id'] ?>&amp;post_id=commentList" data-toggle="modal" data-target="#modalShow">Supprimer</a>

        <?php
        if ($comments['report'] == 1):
          ?>
          <a class="btn btn-outline-primary" href="index.php?action=reportComment&amp;id=<?= $comments['c_id'] ?>&amp;report=0&amp;post_id=commentList">Accepter</a>
        <?php
        endif;
        ?>
        <hr>
      </div>
      <?php
    }
    ?>
  </div>
</section>
<?php
$content = ob_get_clean();
require('view/frontend/template.php');
