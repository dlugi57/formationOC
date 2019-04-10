<?php $title = "Nouveau chapitre";
$subTitle = "subtitle"; ?>

<?php ob_start(); ?>


<div class="container connexion">
  <div class="row justify-content-center">
    <div class="col-sm-10 col-md-10 col-lg-10">
        <div class="card">
            <div class="card-body">
              <form action="index.php?action=newPost" method="post">
                <div class="form-group">
                  <label for="postTitle">Titre</label>
                  <input type="text" class="form-control" id="postTitle" name="postTitle" placeholder="Titre" />
                </div>
                <div class="form-group">
                  <textarea id="postContent" name="postContent"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
    </div>
  </div>
</div>



<!--
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
-->
<script>
tinymce.init({
    selector: '#postContent',
    height: 300,
});
</script>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
