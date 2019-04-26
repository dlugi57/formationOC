<?php
$title = "Commands | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Commands
    <small>Control panel</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- Main row -->
  <div class="row">




    <!-- Main col -->
    <section class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Liste de commands</h3>
          <div class="pull-right box-tools">
            <a type="button" href="index.php?action=addCommand" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Ajouter command</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
          <table class="clientsTable table table-bordered table-striped table-hover">
            <thead>
            <tr>
              <th>Nom</th>
              <th>Type</th>
              <th>Prix</th>
              <th>Costs</th>
              <th>KM</th>
              <th>Description</th>
              <th>Date</th>
            </tr>
            </thead>
            <tbody>
              <?php
              while ($data = $commands->fetch())
              {
              ?>
              <tr class='clickableRowClient' data-href='index.php?action=command&amp;id=<?= $data['id_command'] ?>'>
                <td><?= $data['name'] ?></td>
                <td><?= $data['nom_type_command'] ?></td>
                <td><?= $data['prise_command'] ?> €</td>
                <td><?= $data['cost_command'] ?> €</td>
                <td><?= $data['km_cmd'] ?></td>
                <td><?= $data['description_command'] ?></td>
                <td><?= $data['command_date_fr'] ?></td>
              </tr>
              <?php
              }
              $commands->closeCursor();
              ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Nom</th>
              <th>Type</th>
              <th>Prix</th>
              <th>Costs</th>
              <th>KM</th>
              <th>Description</th>
              <th>Date</th>
            </tr>
            </tfoot>
          </table>
          </div>
        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.Main col -->





    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Messages</span>
          <span class="info-box-number">1,410</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Likes</span>
          <span class="info-box-number">41,410</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Events</span>
          <span class="info-box-number">41,410</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Likes</span>
          <span class="info-box-number">93,139</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row (main row) -->
</section>
<!-- /.content -->

<?php
$content = ob_get_clean();
require('template.php');
