<?php
$title = "Nouveau chapitre";
$subTitle = "Quand rien ne va plus, ça peut être le commencement d'un nouveau chapitre.";
ob_start(); ?>

<div class="container connexion">
  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-12 col-lg-10">
        <div class="card">
            <div class="card-body">
              <form action="index.php?action=newPost" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" id="postTitle" name="postTitle" placeholder="Titre" required/>
                  <div class="invalid-feedback">Formulaire mal ramplis</div>
                </div>
                <div class="form-group">
                  <textarea id="postContent" name="postContent"></textarea>
                  <div id="invalidContent" class="invalid-feedback">Formulaire mal ramplis</div>
                </div>
                <button id="addPostBtn" type="submit" class="btn btn-outline-secondary btn-block">Enregistre</button>
              </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
tinymce.init({
    selector: '#postContent',
    height: 400,
});
</script>
<?php
$content = ob_get_clean();
require('view/frontend/template.php');
