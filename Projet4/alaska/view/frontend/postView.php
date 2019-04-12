<?php
if (isset($_SESSION['nick'])) {
  $nick =  $_SESSION['nick'];
}
if (isset($_SESSION['admin'])) {
  $admin = $_SESSION['admin'];
}
if (isset($_SESSION['userId'])) {
  $userId = $_SESSION['userId'];
}
$title = "BILLET SIMPLE POUR L'ALASKA";
$subTitle = htmlspecialchars($post['title']);

ob_start(); ?>

<section class="postViev">
  <div class="postVievContent">
    <p id="postDate">Mise en ligne le <?= $post['creation_date_fr'] ?></p>
    <div id="postText">
      <?= $post['content'] ?>
    </div>
    <?php
    if (isset($admin))
    {
      if ($admin == 1)
      {
        ?>
        <a class="btn btn-outline-success" href="index.php?action=editPost&amp;id=<?= $post['id'] ?>">Modifier post</a>
        <a class="btn btn-outline-danger" href="index.php?action=deletePost&amp;id=<?= $post['id'] ?>">Supprimer post</a>
        <?php
      }
    }
    ?>
  </div>
</section>

<section class="postComments">
  <div>
    <h2>COMMENTAIRES</h2>
    <hr>
    <?php
    while ($comment = $comments->fetch())
    {
      ?>
      <div class="commentContent">
        <?php
        if ($comment['report'] == 1)
        {
          ?>
          <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> LE <?= $comment['comment_date_fr'] ?></p>
          <p id="reportingComment">Commentaire signalé <i class="fas fa-exclamation-triangle"></i></p>
          <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
          <?php
        }else
        {
          ?>
          <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> LE <?= $comment['comment_date_fr'] ?></p>
          <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
          <?php
        }

        if (isset($admin))
        {
          if ($admin == 1)
          {
            ?>
            <a class="btn btn-outline-success" href="index.php?action=editComment&amp;id=<?= $comment['c_id'] ?>">Modifier</a>
            <a class="btn btn-outline-danger" href="index.php?action=deleteComment&amp;id=<?= $comment['c_id'] ?>&amp;post_id=<?= $comment['post_id'] ?>">Supprimer</a>
            <?php if ($comment['report'] == 1): ?>
              <a class="btn btn-outline-primary" href="index.php?action=reportComment&amp;id=<?= $comment['c_id'] ?>&amp;report=0&amp;post_id=<?= $comment['post_id'] ?>">Accepter</a>
            <?php endif;
          }elseif ($admin == 0 && $comment['report'] == 0)
          {
            $modalMsg = "Souhaitez-vous signaler ce commentaire ?";
            ?>
            <a class="btn btn-outline-secondary" data-href="index.php?action=reportComment&amp;id=<?= $comment['c_id'] ?>&amp;report=1&amp;post_id=<?= $comment['post_id'] ?>" href="index.php?action=reportComment&amp;id=<?= $comment['c_id'] ?>&amp;report=1&amp;post_id=<?= $comment['post_id'] ?>" data-toggle="modal" data-target="#modalShow">Signaler</a>
            <?php
          }
        }
        ?>
        <hr>
      </div>
      <?php
    }
    if (isset($admin))
    {
      if ($admin == 1 || $admin == 0)
      {
        ?>
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="w-100">
              <h3>LAISSEZ UN COMMENTAIRE</h3>
              <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>&amp;author=<?php if (isset($userId)) { echo $userId;} ?>" method="post">
                <div class="form-group">
                  <p>Auteur : <?php if (isset($nick)) { echo htmlspecialchars($nick);} ?></p>
                </div>
                <div class="form-group">
                  <textarea id="commentPostContent" name="comment" class="form-control" required><?= htmlspecialchars($comment['comment']) ?></textarea>
                  <div class="invalid-feedback invalidContent">Formulaire mal ramplis</div>
                </div>
                <button id="commentPostBtn" type="submit" class="btn btn-outline-success btn-block">Enregistre</button>
              </form>
            </div>
          </div>
        </div>
        <?php
      }
    }else
    {
      ?>
      <a class="btn btn-outline-secondary btn-block"  href="?action=createMember">Ajouter un commentaire</a>
      <?php
    }
    ?>
  </div>
</section>

<?php
$content = ob_get_clean();
require('template.php');
