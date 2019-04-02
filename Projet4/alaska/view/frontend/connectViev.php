<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>





<div class="">
  <h2 >Login membres</h2>

  <form class="login-form" method="post" action="index.php?action=login">
      <p>
          <p> <?php
                  if (isset($_GET['error'])) {
                    echo $_GET['error'];
                  };
           ?></p>
           <?php
           $letter = chr(rand(65,90));
           echo "<p>".$letter."@gmail.com</p>";
            ?>
          <label>Votre pseudo : <input type="text" name="login" placeholder="pseudo" value="test"></label></br>

          <label>Créez un mot de passe : <input type="password" name="pass" placeholder="Password" value="test" /></label></br>

      </p>
      <button type="button submit" class="btn btn-outline-light btn-lg col-xs-12" name="login1">Check</button>
  </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
