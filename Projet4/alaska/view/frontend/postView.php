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
$title = htmlspecialchars($post['title']);
$subTitle = "subtitle"; ?>

<?php ob_start(); ?>

<div>
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
        <?php
        if (isset($admin))
        {
          if ($admin == 1)
          {
            ?>
            <em><a href="index.php?action=editPost&amp;id=<?= $post['id'] ?>">Modifier post</a></em>
            <em><a href="index.php?action=deletePost&amp;id=<?= $post['id'] ?>">Supprimer post</a></em>
            <?php
          }
        }
        ?>
    </h3>

    <p>
        <?= nl2br($post['content']) ?>
    </p>
</div>
<div>
<h2>Commentaires</h2>
<?php
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



while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?>
      repport -><?= nl2br(htmlspecialchars($comment['report']));
      $html = "";
      if (isset($admin))
      {
        if ($admin == 1)
        {
          $html .= '(<a href="index.php?action=editComment&amp;id='. $comment['c_id'] .'">modifier</a>)
          (<a href="index.php?action=deleteComment&amp;id='. $comment['c_id'] .'&amp;post_id='. $comment['post_id'] .'">supprimer</a>)
          (<a href="index.php?action=reportComment&amp;id='. $comment['c_id'] .'&amp;report=0&amp;post_id='. $comment['post_id'] .'">Unsignaler</a>)';
        }elseif ($admin == 0 && $comment['report'] == 0)
        {
          $html .= '(<a href="index.php?action=reportComment&amp;id='. $comment['c_id'] .'&amp;report=1&amp;post_id='. $comment['post_id'] .'">Signaler</a>)';// code...
        }
        // i need to add some conditions to hide comment after report
      }
      echo $html;
?>
    </p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>



<?php
}
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');
