<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <!-- HEAD with all metadata -->
    <?php require('view/frontend/head.php'); ?>
  </head>

  <body>
    <?php
    require('view/frontend/header.php');
    //for some pages there is different aspect with smaller photo and subtitle
    if (isset($_GET['action'])):
      //if (($_GET['action'] !== 'home') && ($_GET['action'] !== 'createMember') && ($_GET['action'] !== 'loginPage')):
      if (($_GET['action'] === 'listPosts') || ($_GET['action'] === 'post') || ($_GET['action'] === 'editComment') || ($_GET['action'] === 'commentList') || ($_GET['action'] === 'createPost') || ($_GET['action'] === 'editPost')): ?>
        <section class="headline">
          <div class="ancre100" id="intro"></div>
          <div class="headlineBlock" id="headlineBlock">
            <div id="headlineDescription">
              <h1 id="headlineTitle"><?= $title ?></h1>
              <p id="headlineText"><?= $subTitle ?></p>
            </div>
          </div>
        </section>
      <?php
      endif;
    endif;
     ?>
    <?= $content ?>

    <!-- MODAL -->
    <!-- Modal is visible only few times with deleting and reporting -->
    <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php if (isset($modalMsg)) {echo $modalMsg;} ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
            <a type="" class="btn btn-danger btn-ok">OK</a>
          </div>
        </div>
      </div>
    </div>
    <!-- FOOTER -->
    <footer id="footer">
      <ul class="copyright">
        <li>Copyright © Jean Forteroche</li><li>DESIGN : SUNNY MOMENTS</li>
      </ul>
    </footer>
    <!-- SCRIPTS -->
    <script src="public/js/scripts.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
