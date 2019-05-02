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
          <!-- col left -->
          <div class="col-md-6">
            <div class="form-group">
              <label>Nom </label>
              <select name="clients_id" class="form-control select2 addSeanceClient" required>
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
                while ($data = $clientsList->fetch())
                {
                  ?>
                  <option value="<?= $data['id_client'] ?>"><?= htmlspecialchars($data['name']) ?></option>
                  <?php
                }
                ?>
              </select>
              <span class="help-block"></span>
            </div>
            <!-- select -->
            <div class="form-group">
              <label>Seance type</label>
              <select name="type" class="form-control">
                <?php
                while ($data = $newSeancePage->fetch())
                {
                  ?>
                  <option value="<?= $data['id_type_seance'] ?>"><?= htmlspecialchars($data['nom_type']) ?></option>
                  <?php
                }
                 ?>
              </select>
            </div>

            <!-- Date -->
            <div class="form-group">
              <label>Date seance:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="seance_date" type="text" class="form-control pull-right addSeanceDate" id="datepickerSeance" required>
              </div>
              <span class="help-block"></span>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->

            <!-- time Picker -->
            <div class="bootstrap-timepicker">
              <div class="form-group">
                <label>Heure:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input name="time_seance" type="text" class="form-control timepicker addSeanceTime">
                </div>
                <span class="help-block"></span>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>

            <!-- Prix -->
            <div class="form-group">
              <label>Prix</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-eur"></i>
                </div>
                <input name="prise" type="number" class="form-control addSeancePrix" required>
              </div>
              <span class="help-block"></span>
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
                <input name="depenses" type="number" class="form-control">
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->
          </div>
          <!-- /.col left -->

          <!-- col roght -->
          <div class="col-md-6">
            <!-- model -->
            <div class="form-group">
              <label>Model</label>
              <input name="model" type="text" class="form-control" maxlength="250">
            </div>
            <!-- adresse -->
            <div class="form-group">
              <label>Adresse</label>
              <input name="adresse_seance" type="text" class="form-control" maxlength="250">
            </div>
            <!-- city -->
            <div class="form-group">
              <label>Ville</label>
              <input name="city_seance" type="text" class="form-control" maxlength="250">
            </div>
            <!-- distance -->
            <div class="form-group">
              <label>Distance KM</label>
              <input name="km" class="form-control" type="number">
            </div>
            <!-- description -->
            <div class="form-group">
              <label>Description</label>
              <textarea name="description_seance" class="form-control" rows="5" maxlength="500"></textarea>
            </div>
          </div>
          <!--/.col right-->
        </div>
        <!--/.row-->
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
          <button type="submit" class="btn btn-info pull-right addSeance">Ajouter</button>
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
