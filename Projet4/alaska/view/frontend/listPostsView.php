<?php $title = 'Liste des chapitres - Jean Forteroche';
if (isset($_SESSION['admin'])) {
  $admin = $_SESSION['admin'];
}
ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p>Liste des chapitres disponibles</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div>
        <h3><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em></a>
            <?php
            if (isset($admin))
            {
              if ($admin == 1)
              {
                ?>
                <em><a href="index.php?action=editPost&amp;id=<?= $data['id'] ?>">Modifier</a></em>
                <em><a href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>">Supprimer</a></em>
                <?php
              }
            }
            ?>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($data['extraits'])) ?> ... <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">[Lire la suite]</a>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
