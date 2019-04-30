<?php
$title = "Client | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= $client['name'] ?>
    <small>Control panel</small>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <!-- Main row -->
  <div class="row">
    <!-- Main col left-->
    <div class="col-sm-6 col-md-4">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Client</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body box-profile">
          <h3 class="profile-username text-center"><?= $client['name'] ?></h3>
          <p class="text-muted text-center"><?= $client['creation_date_fr'] ?></p>
          <hr>
          <strong><i class="fa fa-phone margin-r-5"></i> <?= $client['tel'] ?></strong>
          <a href="tel:<?= $client['tel'] ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-phone"></i>
          </a>
          <hr>
          <strong><i class="fa fa-envelope margin-r-5"></i> <?= $client['email'] ?></strong>
          <a target="_blank" href="mailto:<?= $client['email'] ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-send"></i>
          </a>
          <hr>
          <strong><i class="fa fa-map margin-r-5"></i> <?= $client['adress'] ?></strong>
          <a target="_blank" href="https://maps.google.com/?q=<?= $mapsAdresseClient = $client['city'] . ' ' . $client['adress']  ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-map-marker"></i>
          </a>
          <hr>
          <strong><i class="fa fa-home margin-r-5"></i> <?= $client['city'] ?></strong>
          <hr>
          <strong><i class="fa  fa-map-signs margin-r-5"></i> <?= $client['post_code'] ?></strong>
          <hr>
          <strong><i class="fa fa-search margin-r-5"></i> <?= $client['nom_contact_by'] ?></strong>
          <hr>
          <p class="text-muted text-center"><?= $client['description'] ?></p>
          <hr>
          <div>
            <a href="#" class="btn btn-danger pull-left"><b><i class="fa fa-trash-o"></i></b></a>
            <a href="#" class="btn btn-primary pull-right"><b>Modifier</b></a>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.box -->
    <!-- Main col right-->
    <div class="col-sm-6 col-md-8">
      <!-- TABLE: SEANCES -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Seances</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Nom</th>
                <th>Date</th>
                <th>Type</th>
                <th>Endroit</th>
                <th>Prix</th>
              </tr>
              </thead>
              <tbody>
                <?php
                while ($seanceData = $seance->fetch())
                {
                  ?>
                  <tr class='clickableRowClient' data-href='index.php?action=seance&amp;id=<?= $seanceData['id_seance'] ?>'>
                    <td><?= $seanceData['name'] ?></td>
                    <td><?= $seanceData['seance_date_fr'] ?></td>
                    <td><span class="label <?= $seanceData['color_boot']  ?>"><?= $seanceData['nom_type'] ?></span></td>
                    <td><?= $seanceData['city_seance'] ?></td>
                    <td><?= $seanceData['prise'] ?> €</td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a href="index.php?action=addSeancePage&amp;id=<?= $client['id_client'] ?>" class="btn btn-sm btn-danger btn-flat pull-left">Ajouter Seance</a>
          <a href="index.php?action=listSeances" class="btn btn-sm btn-default btn-flat pull-right">Seances List</a>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->

      <!-- TABLE: COMMANDS -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Commands</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Type</th>
                <th>Prise</th>
                <th>Cost</th>
                <th>Net</th>
                <th>Description</th>
                <th>Date</th>
              </tr>
              </thead>
              <tbody>
                <?php
                while ($commandData = $command->fetch())
                {
                  ?>
                  <tr class='clickableRowClient' data-href='index.php?action=command&amp;id=<?= $commandData['id_command'] ?>'>
                    <td><?= $commandData['nom_type_command'] ?></td>
                    <td><?= $commandData['prise_command'] ?> €</td>
                    <td><?= $commandData['cost_command'] ?> €</td>
                    <td><?= $cashCmdNet = $commandData['prise_command'] - $commandData['cost_command'] ?> €</td>
                    <td><?= $commandData['description_command'] ?></td>
                    <td><?= $commandData['command_date_fr'] ?></td>
                  </tr>
                  <?php
                }
                $command->closeCursor();
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a href="index.php?action=addCommand" class="btn btn-sm btn-danger btn-flat pull-left">Ajouter Command</a>
          <a href="index.php?action=listCommands" class="btn btn-sm btn-default btn-flat pull-right">Commands List</a>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<?php
$content = ob_get_clean();
require('template.php');
