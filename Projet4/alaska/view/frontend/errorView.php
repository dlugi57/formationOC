<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <title>Error page</title>
      <!-- HEAD with all metadata -->
      <?php require('view/frontend/head.php'); ?>
  </head>
  <body>
    <section class="errorShow">
      <div class="errorShadow">
        <div class="errorContainer">
          <p id="oops">OOPS!</p>
          <p><?= $errorMsg ?></p>
          <?php
          if (isset($_SERVER['HTTP_REFERER'])) {
          ?>
          <a class="btn btn-outline-primary btn-lg" href="<?= $_SERVER['HTTP_REFERER'] ?>">Retour au site</a>
          <?php
          }
          ?>
        </div>
      </div>
    </section>
  </body>
</html>
