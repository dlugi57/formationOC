<?php
$title = "Billet simple pour l'Alaska";
$subTitle = 'Liste des chapitres disponibles';
if (isset($_SESSION['admin'])) {
  $admin = $_SESSION['admin'];
}
ob_start(); ?>

<?php
while ($data = $posts->fetch())
{
?>
<section class="postList">
  <div>
      <h3>
        <a id="postListTitle" href="index.php?action=post&amp;id=<?= $data['id'] ?>">
          <?= htmlspecialchars($data['title']) ?>
        </a>
      </h3>
      <p> Publie le <?= $data['creation_date_fr'] ?></p>
      <p>
          <?= nl2br(htmlspecialchars($data['extraits'])) ?> ... <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">[Lire la suite]</a>
      </p>
      <?php
      if (isset($admin))
      {
        if ($admin == 1)
        {
          ?>
          <a class="btn btn-outline-dark btn-perso-list" href="index.php?action=post&amp;id=<?= $data['id'] ?>">LIRE LE CHAPITRE</a>
          <a class="btn btn-outline-success" href="index.php?action=editPost&amp;id=<?= $data['id'] ?>">Modifier</a>
          <a class="btn btn-outline-danger" href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>">Supprimer</a>
          <?php
        }
      }
      ?>
  </div>
</section>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
