<?php
$title = "Ajouter commande | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Ajouter commande
    <small>Control panel</small>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <!-- general form elements disabled -->
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Ajouter commande</h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="index.php?action=addCommand">
      <div class="box-body">
        <div class="row">
          <!-- col left -->
          <div class="col-md-6">
            <div class="form-group">
              <label>Nom </label>
              <select name="client_id_cmd" class="form-control select2 addCommandClient" style="width: 100%;" required>
                <?php
                if (isset($client['name'])):
                  ?>
                  <option value="<?= $client['id_client'] ?>" selected="selected"><?= htmlspecialchars($client['name']) ?></option>
                  <?php
                else:
                  ?>
                  <option value="" selected="selected"></option>
                  <?php
                endif;
                while ($data = $clientsList->fetch()):
                  ?>
                  <option value="<?= $data['id_client'] ?>"><?= htmlspecialchars($data['name']) ?></option>
                  <?php
                endwhile;
                ?>
              </select>
              <span class="help-block"></span>
            </div>

            <!-- select -->
            <div class="form-group">
              <label>Type commande</label>
              <select name="type_command" class="form-control">
                <?php
                while ($data = $newCommandPage->fetch()):
                  ?>
                  <option value="<?= $data['id_type_command'] ?>"><?= htmlspecialchars($data['nom_type_command']) ?></option>
                  <?php
                endwhile;
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
                <input name="prise_command" type="number" class="form-control addCommandPrise" required>
              </div>
              <span class="help-block"></span>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->

            <!-- Depenses -->
            <div class="form-group">
              <label>Dépenses</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-money"></i>
                </div>
                <input name="cost_command" type="number" class="form-control">
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
          <textarea name="description_command" class="form-control" rows="3" maxlength="250"></textarea>
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
          <button type="submit" class="btn btn-info pull-right addCommand">Ajouter</button>
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
