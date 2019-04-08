<?php require('view/frontend/head.php'); ?>
<section class="errorShow">
  <div class="errorShadow">
    <div class="errorContainer">
      <p id="oops">OOPS!</p>
      <p><?= $errorMsg ?></p>
      <a class="btn btn-outline-primary btn-lg" href="<?= $_SERVER['HTTP_REFERER'] ?>">Retour au site</a>
    </div>
  </div>
</section>
