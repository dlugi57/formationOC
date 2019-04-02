<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>





<div class="createMembres">
  <h2 >Create membres</h2>

  <form class="login-form" method="post" action="index.php?action=newMember">
      <p>
          <p> <?php
                  if (isset($_GET['error'])) {
                    echo $_GET['error'];
                  };
           ?></p>
          <label>Votre pseudo : <input type="text" name="nick" placeholder="pseudo"></label></br>
          <label>Votre e-mail : <input type="text" name="email" placeholder="e-mail" /></label></br>
          <label>Confirmez votre e-mail : <input type="text" name="email_confirm" placeholder="confirm e-mail" /></label></br>
          <label>Créez un mot de passe : <input type="password" name="password" placeholder="Password" /></label></br>
          <label>Confirmez votre mot de passe : <input type="password" name="password_confirm" placeholder="confirm Password" /></label></br>
      </p>
      <button type="button submit" class="btn btn-outline-light btn-lg col-xs-12" name="login">Check</button>
  </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
