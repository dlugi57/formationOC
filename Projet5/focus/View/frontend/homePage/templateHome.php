<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>FOCUS - CRM, gestion clients et séances pour photographes</title>
    <!-- HEAD with all metadata -->
    <?php require('View/frontend/homePage/head.php'); ?>
  </head>

  <body>
    <?php
    require('View/frontend/homePage/header.php');
    //for some pages there is different aspect with smaller photo and subtitle
    if (isset($_GET['action'])):
      //if (($_GET['action'] !== 'home') && ($_GET['action'] !== 'createMember') && ($_GET['action'] !== 'loginPage')):
      if (($_GET['action'] === 'acceptMember')): ?>
        <section class="headline">
          <div class="ancre100" id="intro"></div>
          <div class="headlineBlock" id="headlineBlock">
            <div id="headlineDescription">
            <h2>demande d'inscription</h2>
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
    <div class="modal fade" id="modalShowHome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Ce site est un projet OpenClassroom et n'est en aucun cas lié à la vente au distribution de solution presente.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
    <!-- FOOTER -->
    <footer id="footer">
      <ul class="copyright">
        <li>FOCUS © CRM</li><li>DESIGN : SUNNY MOMENTS</li>
      </ul>
    </footer>
    <!-- SCRIPTS -->
    <!-- HomePage -->
    <script src="Public/js/home.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
