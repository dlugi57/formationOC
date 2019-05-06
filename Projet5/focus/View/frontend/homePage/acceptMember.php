<?php
$title = "Accept";
ob_start();
?>
<section>
  <div class="information">
    <p>votre demande d'inscription a été envoyée au administrateur</p>
    <a href="index.php?action=home" class="btn btn-outline-dark btn-lg btn-perso">HOME</a>
  </div>
</section>


<?php
$content = ob_get_clean();
require('templateHome.php');
