<?php
$title = "Client | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= htmlspecialchars($client['name']) ?>
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
          <h3 class="profile-username text-center"><?= htmlspecialchars($client['name']) ?></h3>
          <p class="text-muted text-center"><?= htmlspecialchars($client['creation_date_fr']) ?></p>
          <hr>
          <strong><i class="fa fa-phone margin-r-5"></i> <?= htmlspecialchars($client['tel']) ?></strong>
          <a href="tel:<?= htmlspecialchars($client['tel']) ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-phone"></i>
          </a>
          <hr>
          <strong><i class="fa fa-envelope margin-r-5"></i> <?= htmlspecialchars($client['email']) ?></strong>
          <a target="_blank" href="mailto:<?= htmlspecialchars($client['email']) ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-send"></i>
          </a>
          <hr>
          <strong><i class="fa fa-map margin-r-5"></i> <?= htmlspecialchars($client['adress']) ?></strong>
          <a target="_blank" href="https://maps.google.com/?q=<?= $mapsAdresseClient = htmlspecialchars($client['city']) . ' ' . htmlspecialchars($client['adress'])  ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-map-marker"></i>
          </a>
          <hr>
          <strong><i class="fa fa-home margin-r-5"></i> <?= htmlspecialchars($client['city']) ?></strong>
          <hr>
          <strong><i class="fa  fa-map-signs margin-r-5"></i> <?= htmlspecialchars($client['post_code']) ?></strong>
          <hr>
          <strong><i class="fa fa-search margin-r-5"></i> <?= htmlspecialchars($client['nom_contact_by']) ?></strong>
          <hr>
          <p class="text-muted text-center"><?= htmlspecialchars($client['description']) ?></p>

          <?php
          if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1):
          ?>
          <hr>
          <div>
            <?php $modalMsg = "Êtes vous sûr de vouloir supprimer client?"; ?>
            <a data-href="index.php?action=removeClient&amp;id=<?= $client['id_client'] ?>" class="btn btn-danger pull-left" data-toggle="modal" data-target="#modalShow"><b><i class="fa fa-trash-o"></i></b></a>
            <a href="index.php?action=modifyClientPage&amp;id=<?= $client['id_client'] ?>" class="btn btn-primary pull-right"><b>Modifier</b></a>
          </div>
          <?php
          endif;
           ?>
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
          <h3 class="box-title">Séances</h3>

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
                while ($seanceData = $seance->fetch()):
                  ?>
                  <tr class='clickableRowClient' data-href='index.php?action=seance&amp;id=<?= $seanceData['id_seance'] ?>'>
                    <td><?= htmlspecialchars($seanceData['name']) ?></td>
                    <td><?= htmlspecialchars($seanceData['seance_date_fr']) ?></td>
                    <td><span class="label <?= htmlspecialchars($seanceData['color_boot'])  ?>"><?= htmlspecialchars($seanceData['nom_type']) ?></span></td>
                    <td><?= htmlspecialchars($seanceData['city_seance']) ?></td>
                    <td><?= htmlspecialchars($seanceData['prise']) ?> €</td>
                  </tr>
                  <?php
                endwhile;
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a href="index.php?action=addSeancePage&amp;id=<?= $client['id_client'] ?>" class="btn btn-sm btn-danger btn-flat pull-left">Ajouter Séance</a>
          <a href="index.php?action=listSeances" class="btn btn-sm btn-default btn-flat pull-right">Liste des séances</a>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->

      <!-- TABLE: COMMANDS -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Commandes</h3>

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
                <th>Prix</th>
                <th>Dépenses</th>
                <th>Net</th>
                <th>Description</th>
                <th>Date</th>
              </tr>
              </thead>
              <tbody>
                <?php
                while ($commandData = $command->fetch()):
                  ?>
                  <tr class='clickableRowClient' data-href='index.php?action=command&amp;id=<?= $commandData['id_command'] ?>'>
                    <td><?= htmlspecialchars($commandData['nom_type_command']) ?></td>
                    <td><?= htmlspecialchars($commandData['prise_command']) ?> €</td>
                    <td><?= htmlspecialchars($commandData['cost_command']) ?> €</td>
                    <td><?= $cashCmdNet = htmlspecialchars($commandData['prise_command']) - htmlspecialchars($commandData['cost_command']) ?> €</td>
                    <td><?= htmlspecialchars($commandData['description_command']) ?></td>
                    <td><?= htmlspecialchars($commandData['command_date_fr']) ?></td>
                  </tr>
                  <?php
                endwhile;
                $command->closeCursor();
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a href="index.php?action=addCommandPage&amp;id=<?= $client['id_client'] ?>" class="btn btn-sm btn-danger btn-flat pull-left">Ajouter Commande</a>
          <a href="index.php?action=listCommands" class="btn btn-sm btn-default btn-flat pull-right">Liste des commandes</a>
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
