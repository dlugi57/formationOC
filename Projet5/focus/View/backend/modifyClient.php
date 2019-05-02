<?php
$title = "Modifier client | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= htmlspecialchars($modifyClient['name']) ?>
    <small>Modifier client</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- general form elements disabled -->
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Modifier client</h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="index.php?action=modifyClient&amp;id=<?= $modifyClient['id_client'] ?>">
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <!-- text input -->
          <div class="form-group">
            <label>Nom</label>
            <input name="name" value="<?= htmlspecialchars($modifyClient['name']) ?>" type="text" class="form-control addClientName" maxlength="250" required>
            <span class="help-block"></span>
          </div>
          <!-- Telephone -->
          <div class="form-group">
            <label>Telephone</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-phone"></i>
              </div>
              <input name="tel" type="tel" value="<?= htmlspecialchars($modifyClient['tel']) ?>" class="form-control addClientTel" data-inputmask='"mask": "9999999999"' data-mask required>
            </div>
            <span class="help-block"></span>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
          <!-- Date -->
          <div class="form-group">
            <label>Email</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
              </div>
              <input name="email" value="<?= htmlspecialchars($modifyClient['email']) ?>" type="email" class="form-control addClientEmail">
            </div>
            <span class="help-block"></span>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
          <div class="form-group">
            <label>Adresse</label>
            <input name="adress" value="<?= htmlspecialchars($modifyClient['adress']) ?>" type="text" class="form-control" maxlength="250">
          </div>
          <div class="form-group">
            <label>Ville</label>
            <input name="city" value="<?= htmlspecialchars($modifyClient['city']) ?>" type="text" class="form-control" maxlength="250">
          </div>
          <div class="form-group">
            <label>Code postale</label>
            <input name="post_code" value="<?= htmlspecialchars($modifyClient['post_code']) ?>" type="text" class="form-control addClientPost" data-inputmask='"mask": "99999"' data-mask>
            <span class="help-block"></span>
          </div>
        </div>
        <!--/.col-->
        </div>
        <!--/.row-->
        <!-- select -->
        <div class="form-group">
          <label>Contacte par</label>
          <select name="contact_by" class="form-control">
            <option value="<?= $modifyClient['id_contact_by'] ?>" selected="selected"><?= htmlspecialchars($modifyClient['nom_contact_by']) ?></option>

            <?php
            while ($data = $modifyClientContact->fetch())
            {
              ?>
              <option value="<?= $data['id_contact_by'] ?>"><?= htmlspecialchars($data['nom_contact_by']) ?></option>
              <?php
            }
             ?>
          </select>
        </div>
        <!-- textarea -->
        <div class="form-group">
          <label>Description</label>
          <textarea name="description" class="form-control" rows="3" maxlength="500"><?= htmlspecialchars($modifyClient['description']) ?></textarea>
        </div>
        <div class="box-footer">
          <?php
          //if we can return to the last page show button
          if (isset($_SERVER['HTTP_REFERER'])):
            ?>
            <a class="btn btn-default" href="<?= $_SERVER['HTTP_REFERER'] ?>">Retour</a>
            <?php
          endif;
          ?>
          <button type="submit" class="btn btn-info pull-right addClient">Modifier</button>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box-body -->
    </form>
  </div>
</section>
<!-- /.content -->

<?php
$content = ob_get_clean();
require('View/frontend/template.php');
