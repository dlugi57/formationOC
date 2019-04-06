<?php $title = "Nouveau chapitre";
$subTitle = "subtitle"; ?>

<?php ob_start(); ?>
<h1>Nouveau chapitre</h1>





<div class="comments">


<form action="index.php?action=newPost" method="post">
    <div>
        <label for="postTitle">Titre</label><br />
        <input type="text" id="postTitle" name="postTitle" />
    </div>
    <div>
        <label for="postContent">Contenu</label><br />
        <textarea id="postContent" name="postContent"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>


</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
