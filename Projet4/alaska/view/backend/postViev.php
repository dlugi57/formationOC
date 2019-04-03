<?php $title = "Create Post" ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p class="navigator"><a href="index.php">Retour à la liste des billets</a></p>




<div class="comments">
<h2>Create post</h2>

<form action="index.php?action=newPost" method="post">
    <div>
        <label for="postTitle">Title</label><br />
        <input type="text" id="postTitle" name="postTitle" />
    </div>
    <div>
        <label for="postContent">Content</label><br />
        <textarea id="postContent" name="postContent"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>


</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend//template.php'); ?>
