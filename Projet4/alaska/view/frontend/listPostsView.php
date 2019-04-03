<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p class="navigator">Derniers billets du blog :</p>
<a href="?action=home">Home</a>

<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em></a>
            <em><a href="index.php?action=editPost&amp;id=<?= $data['id'] ?>">Modifier post</a></em>
            <em><a href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>">Supprimer post</a></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
