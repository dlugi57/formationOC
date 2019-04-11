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
    <p>
      <?= nl2br($post['content']) ?>
    </p>
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
<h2>Commentaires</h2>
<?php




while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?>
      repport -><?= $comment['report'];
      //$html = "";


?>
    </p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
if (isset($admin))
{
  if ($admin == 1)
  {
    ?>
    <a class="btn btn-outline-warning" href="index.php?action=editComment&amp;id=<?= $comment['c_id'] ?>">Modifier</a>
    <a class="btn btn-outline-danger" href="index.php?action=deleteComment&amp;id=<?= $comment['c_id'] ?>&amp;post_id='. $comment['post_id'] .'">Supprimer</a>
    <?php if ($comment['report'] == 1): ?>
          <a class="btn btn-outline-success" href="index.php?action=reportComment&amp;id=<?= $comment['c_id'] ?>&amp;report=0&amp;post_id=<?= $comment['post_id'] ?>">Accepter</a>
    <?php endif; ?>

    <?php
  }elseif ($admin == 0 && $comment['report'] == 0)
  {
    ?>
    <a class="btn btn-outline-secondary" href="index.php?action=reportComment&amp;id=<?= $comment['c_id'] ?>&amp;report=1&amp;post_id=<?= $comment['post_id'] ?>">Signaler</a>
    <?php
  }
  // i need to add some conditions to hide comment after report
}
 ?>


<?php
}
if (isset($admin))
{
  if ($admin == 1 || $admin == 0)
  {
    ?>
    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>&amp;author=<?php if (isset($userId)) { echo $userId;} ?>" method="post">
        <div>
            <p>Auteur : <?php if (isset($nick)) { echo htmlspecialchars($nick);} ?></p>
        </div>
        <div>
            <textarea name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
    <?php
  }
}
?>
</div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php');
