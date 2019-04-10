<?php ob_start(); ?>

<div class="container connexion">
  <div class="row justify-content-center">
    <div class="col-sm-8 col-md-6 col-lg-4">
        <div class="card">
          <div class="card-header">Connexion</div>
            <div class="card-body">
                <form id="loginForm" class="form-horizontal" method="post" action="index.php?action=login">
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
                        <label for="login" class="cols-sm-2 control-label">Pseudo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="login" id="login" placeholder="Entrez votre pseudo" autofocus required/>
                                <div class="invalid-feedback">Formulaire mal ramplis</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pass" class="cols-sm-2 control-label">Mot de passe : </label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="password" class="form-control" name="pass" id="pass" placeholder="Mot de passe" required/>
                                <div class="invalid-feedback">Formulaire mal ramplis</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                      <button id="loginBtn" type="submit" class="btn btn-primary btn-lg btn-block login-button" name="connect">Envoyer</button>
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
require('template.php');
