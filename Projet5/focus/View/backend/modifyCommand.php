<?php
$title = "Modifier commande | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= "Commande ".$modifyCommand['nom_type_command'] ?>
    <small><?= $modifyCommand['name']?></small>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <!-- general form elements disabled -->
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Modifier command</h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="index.php?action=modifyCommand&amp;id=<?= $modifyCommand['id_command'] ?>">
      <div class="box-body">
        <div class="row">
          <!-- col left -->
          <div class="col-md-6">
            <div class="form-group">
              <label>Nom </label>
              <select name="client_id_cmd" class="form-control select2" style="width: 100%;">

                <option value="<?= $modifyCommand['id_client'] ?>" selected="selected"><?= $modifyCommand['name'] ?></option>
                <?php

                while ($data = $modifyCommandClients->fetch())
                {
                  ?>
                  <option value="<?= $data['id_client'] ?>"><?= $data['name'] ?></option>
                  <?php
                }
                ?>
              </select>
            </div>

            <!-- select -->
            <div class="form-group">
              <label>Commande type</label>
              <select name="type_command" class="form-control">
                <option value="<?= $modifyCommand['id_type_command'] ?>" selected="selected"><?= $modifyCommand['nom_type_command'] ?></option>
                <?php
                while ($data = $modifyCommandType->fetch())
                {
                  ?>
                  <option value="<?= $data['id_type_command'] ?>"><?= $data['nom_type_command'] ?></option>
                  <?php
                }
                 ?>
              </select>
            </div>
          </div>
          <!-- /.col left -->

          <!-- col roght -->
          <div class="col-md-6">
            <!-- Prix -->
            <div class="form-group">
              <label>Prix</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-eur"></i>
                </div>
                <input name="prise_command" value="<?= $modifyCommand['prise_command'] ?>" type="number" class="form-control">
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->

            <!-- Depenses -->
            <div class="form-group">
              <label>Depenses</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-money"></i>
                </div>
                <input name="cost_command" value="<?= $modifyCommand['cost_command'] ?>" type="number" class="form-control">
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->
          </div>
          <!--/.col right-->
        </div>
        <!--/.row-->
        <!-- description -->
        <div class="form-group">
          <label>Description</label>
          <textarea name="description_command" class="form-control" rows="3"><?= $modifyCommand['description_command'] ?></textarea>
        </div>
        <!--footer-->
        <div class="box-footer">
          <?php
          //if we can return to the last page show button
          if (isset($_SERVER['HTTP_REFERER'])):
            ?>
            <a class="btn btn-default" href="<?= $_SERVER['HTTP_REFERER'] ?>">Retour</a>
            <?php
          endif;
          ?>
          <button type="submit" class="btn btn-info pull-right">Modifier</button>
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
