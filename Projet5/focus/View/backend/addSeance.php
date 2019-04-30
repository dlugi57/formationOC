<?php
$title = "Ajouter seance | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Ajouter Seance
    <small>Control panel</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- general form elements disabled -->
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Ajouter Seance</h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="index.php?action=addSeance">
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Nom </label>
              <select name="contact_by" class="form-control select2">
            <?php
            if (isset($client['name'])):
              ?>
              <option value="<?= $client['id_client'] ?>" selected="selected"><?= $client['name'] ?></option>
              <?php
            else:
              ?>
              <option value="" selected="selected"></option>
              <?php
            endif;
              while ($data = $clientsList->fetch())
              {
                ?>
                <option value="<?= $data['id_client'] ?>"><?= $data['name'] ?></option>
                <?php
              }
              ?>
              <!-- text input -->
              <!--<input name="name" value="<?php // echo $client['name']; ?>" class="form-control" placeholder="Enter ...">-->

            </select>
          </div>
            <div class="form-group">
              <label>Telephone</label>
              <input name="tel" class="form-control" placeholder="Enter ...">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input name="email" class="form-control" placeholder="Enter ...">
            </div>








          </div>
          <!-- /.col -->
          <div class="col-md-6">

            <div class="form-group">
              <label>Adresse</label>
              <input name="adress" class="form-control" placeholder="Enter ...">
            </div>
            <div class="form-group">
              <label>Ville</label>
              <input name="city" class="form-control" placeholder="Enter ...">
            </div>
            <div class="form-group">
              <label>Code postale</label>
              <input name="post_code" class="form-control" placeholder="Enter ...">
            </div>




            </div>




        </div>
        <!--/.col-->
        <!-- select -->
        <div class="form-group">
          <label>Seance type</label>
          <select name="contact_by" class="form-control">
            <?php
            while ($data = $newSeancePage->fetch()) {

              ?>
              <option value="<?= $data['id_type_seance'] ?>"><?= $data['nom_type'] ?></option>
              <?php

            }
             ?>
          </select>
      </div>
      <!-- textarea -->
      <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
