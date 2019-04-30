<?php
$title = "Ajouter client | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Ajouter Client
    <small>Control panel</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- general form elements disabled -->
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Ajouter client</h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="index.php?action=addClient">
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">






            <!-- text input -->
            <div class="form-group">
              <label>Nom</label>
              <input name="name" type="text" class="form-control">
            </div>


            <!-- Telephone -->
            <div class="form-group">
              <label>Telephone</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                <input name="tel" type="tel" class="form-control" data-inputmask='"mask": "9999999999"' data-mask>
              </div>
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
                <input name="email" type="email" class="form-control">
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->









          </div>
          <!-- /.col -->
          <div class="col-md-6">

            <div class="form-group">
              <label>Adresse</label>
              <input name="adress" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Ville</label>
              <input name="city" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Code postale</label>
              <input name="post_code" type="text" class="form-control" data-inputmask='"mask": "99999"' data-mask>
            </div>




            </div>




        </div>
        <!--/.col-->
        <!-- select -->
        <div class="form-group">
          <label>Contacte par</label>
          <select name="contact_by" class="form-control">
            <?php
            while ($data = $newClientPage->fetch()) {

              ?>
              <option value="<?= $data['id_contact_by'] ?>"><?= $data['nom_contact_by'] ?></option>
              <?php

            }
             ?>
          </select>
      </div>
      <!-- textarea -->
      <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
      </div>
      <!--/.row-->
      <div class="box-footer">
        <?php
        //if we can return to the last page show button
        if (isset($_SERVER['HTTP_REFERER'])) {
        ?>
        <a class="btn btn-default" href="<?= $_SERVER['HTTP_REFERER'] ?>">Retour</a>
        <?php
        }
        ?>
        <button type="submit" class="btn btn-info pull-right">Ajouter</button>
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
