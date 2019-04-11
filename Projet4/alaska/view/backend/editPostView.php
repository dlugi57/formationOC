<?php
$title = 'Mon blog';
$subTitle = "La vie c'est une longue histoire, mais un mauvais chapitre n'est pas nécessairement la fin du livre.";
ob_start(); ?>


<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-12 col-lg-10">
      <div class="card">
        <div class="card-body">
          <form action="index.php?action=editPost&amp;id=<?= $post['id'] ?>" method="post">
            <div class="form-group">
              <input type="text" class="form-control" id="postTitleUpd" name="postTitle" value="<?= $post['title'] ?>" placeholder="Titre"/>
              <div class="invalid-feedback">Formulaire mal ramplis</div>
            </div>
            <div class="form-group">
              <textarea id="updateContent" name="postContent"><?= $post['content'] ?></textarea>
              <div class="invalid-feedback invalidContent">Formulaire mal ramplis</div>
            </div>
            <button class="btn btn-outline-danger btn-block" href="index.php?action=post&amp;id=<?= $post['id'] ?>">Retour au chapitre</button>
            <button id="updatePostBtn" type="submit" class="btn btn-outline-success btn-block">Enregistre</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
tinymce.init({
    selector: '#updateContent',
    height: 400,
});
</script>

<?php
$content = ob_get_clean();
require('view/frontend/template.php');
