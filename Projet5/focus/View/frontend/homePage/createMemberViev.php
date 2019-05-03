<?php
$title = "Connexion";
ob_start();
?>
<div class="container inscription">
  <div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Inscription</div>
            <div class="card-body">
                <form id="inscriptionForm" class="form-horizontal" method="post" action="index.php?action=newMember">
                    <div class="form-group">
                      <?php
                      //show error messages from server
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
                                <input type="text" class="form-control" name="nick" id="nick" placeholder="Entrez votre pseudo" autofocus required/>
                                <div class="invalid-feedback">Formulaire mal ramplis</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Votre e-mail : </label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Entrez votre Email" required/>
                                <div class="invalid-feedback">Formulaire mal ramplis</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmMail" class="cols-sm-2 control-label">Confirmez votre e-mail : </label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="email" class="form-control" name="email_confirm" id="confirmMail" placeholder="Confirmez votre e-mail" required/>
                                <div class="invalid-feedback">Formulaire mal ramplis</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Créez un mot de passe : </label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required/>
                                <div class="invalid-feedback">Formulaire mal ramplis</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPass" class="cols-sm-2 control-label">Répéter mot de passe</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password_confirm" id="confirmPass" placeholder="Confirmez votre mot de passe " required/>
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

<?php
$content = ob_get_clean();
require('templateHome.php');
