<?php $title = 'Mon blog';
$subTitle = 'subtitle';
?>

<?php ob_start(); ?>





<!--<div class="createMembres">
  <h2 >Create membres</h2>

  <form class="login-form" method="post" action="index.php?action=newMember">
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
          <label>Votre pseudo : <input type="text" name="nick" placeholder="pseudo" value="<?= $letter?>test"></label></br>
          <label>Votre e-mail : <input type="text" name="email" placeholder="e-mail" value="<?=$letter."@gmail.com"?>" /></label></br>
          <label>Confirmez votre e-mail : <input type="text" name="email_confirm" placeholder="confirm e-mail" value="<?=$letter."@gmail.com"?>" /></label></br>
          <label>Créez un mot de passe : <input type="password" name="password" placeholder="Password" value="test" /></label></br>
          <label>Confirmez votre mot de passe : <input type="password" name="password_confirm" placeholder="confirm Password" value="test" /></label></br>
      </p>
      <button type="button submit" class="btn btn-primary btn-lg col-xs-12" name="login">Check</button>
  </form>
</div>-->



<div class="container inscription">
<div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Inscription</div>
                            <div class="card-body">
                                <form id="inscriptionForm" class="form-horizontal" method="post" action="index.php?action=newMember">
                                    <div class="form-group">
                                      <?php
                                      if (isset($_GET['error'])) {                                        
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                          <?= $_GET['error'] ?>
                                        </div>
                                        <?php
                                      };
                                      ?>

                                        <label for="nick" class="cols-sm-2 control-label">Pseudo</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="nick" id="nick" placeholder="Entrez votre pseudo" autofocus />
                                                <div class="invalid-feedback">Formulaire mal ramplis</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Votre e-mail : </label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Entrez votre Email" />
                                                <div class="invalid-feedback">Formulaire mal ramplis</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmMail" class="cols-sm-2 control-label">Confirmez votre e-mail : </label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="email" class="form-control" name="email_confirm" id="confirmMail" placeholder="Confirmez votre e-mail" />
                                                <div class="invalid-feedback">Formulaire mal ramplis</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="cols-sm-2 control-label">Créez un mot de passe : </label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" />
                                                <div class="invalid-feedback">Formulaire mal ramplis</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPass" class="cols-sm-2 control-label">Répéter mot de passe</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password_confirm" id="confirmPass" placeholder="Confirmez votre mot de passe " />
                                                <div class="invalid-feedback">Formulaire mal ramplis</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                            <button id="registerBtn" type="button submit" class="btn btn-primary btn-lg btn-block login-button" name="login">Envoyer</button>

                                    </div>
                                    <div class="login-register">
                                        <a href="index.php">Retour au site</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
