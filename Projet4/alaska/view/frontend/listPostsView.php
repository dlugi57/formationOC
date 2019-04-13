<?php
$title = "Billet simple pour l'Alaska";
$subTitle = 'Liste des chapitres disponibles';
if (isset($_SESSION['admin'])) {
  $admin = $_SESSION['admin'];
}
ob_start(); ?>
<section class="postList">
<?php
while ($data = $posts->fetch())
{
  $postsContent = nl2br($data['content']);
  $words = explode(' ', $postsContent);
  $count = 55;
  $extraits = '';
  for ($i = 0; $i < $count && isset($words[$i]); $i++)
  {
      $extraits .= " ".$words[$i];
  }
?>

  <div class="postListContent">
    <h3>
      <a class="postListTitle" href="index.php?action=post&amp;id=<?= $data['id'] ?>">
        <?= htmlspecialchars($data['title']) ?>
      </a>
    </h3>
    <p> Publie le <?= $data['creation_date_fr'] ?></p>
    <p>
        <?= $extraits ?> ... <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">[Lire la suite]</a>
    </p>
    <a class="btn btn-outline-dark btn-perso-list" href="index.php?action=post&amp;id=<?= $data['id'] ?>">LIRE LE CHAPITRE</a>
    <?php
    if (isset($admin)):
      if ($admin == 1):
        $modalMsg = "Êtes vous sûr de vouloir supprimer ?";
        ?>
        <a class="btn btn-outline-success" href="index.php?action=editPost&amp;id=<?= $data['id'] ?>">Modifier</a>
        <a class="btn btn-outline-danger" data-href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>" href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>" data-toggle="modal" data-target="#modalShow">Supprimer</a>
        <?php
      endif;
    endif;
    ?>
  </div>
<?php
}
$posts->closeCursor();
?>
</section>
<?php
$content = ob_get_clean();
require('template.php');
