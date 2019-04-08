<?php require('view/frontend/head.php'); ?>
<section class="errorShow">
  <div class="errorShadow">
    <div class="errorContainer">

      <p id="oops">OOPS!</p>
    <p>cxhuj<?= $errorMsg ?></p>
    <?php     echo '</br><a href="'. $_SERVER['HTTP_REFERER'] .'">Back</a>'; ?>
    </div>
  </div>

</section>
