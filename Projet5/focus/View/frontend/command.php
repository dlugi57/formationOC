<?php
$title = "Commande | Sunny Moments";
ob_start();
 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= $command['name']?>
    <small><?= "Commande ".$command['nom_type_command'] ?></small>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-eur"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Brut</span>
          <span class="info-box-number"><?= $command['prise_command']; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-home"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Net</span>
          <span class="info-box-number"><?= $commandNet = $command['prise_command'] - $command['cost_command']; ?></span>
          <div class="progress">
            <div class="progress-bar" style="width: <?= $percentCmdNet = intval(($commandNet/$command['prise_command'])*100);?>%"></div>
          </div>
          <span class="progress-description"><?= $percentCmdNet;?> % of whole gain</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fa fa-money"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Depenses</span>
          <span class="info-box-number"><?= $command['cost_command']; ?> €</span>
          <div class="progress">
            <div class="progress-bar" style="width: <?= $percentCmdDep = intval(($command['cost_command']/$command['prise_command'])*100);  ?>%"></div>
          </div>
          <span class="progress-description"><?= $percentCmdDep;  ?> % of whole gains</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-calculator"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Qty</span>
          <span class="info-box-number"><?= $command['nom_type_command'] ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Main row -->
  <div class="row">
    <!-- Main col left-->
    <div class="col-md-6">
      <!-- Seance-->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Commande</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body box-profile">
          <h3 class="profile-username text-center">Commande <?= $command['nom_type_command'] ?></h3>
          <p class="text-muted text-center"><?= $command['command_date_fr'] ?></p>
          <hr>

          <strong><i class="fa fa-money margin-r-5"></i> Prix</strong>
          <p>
            Gagne : <?= $command['prise_command'] ?> €
            <br>
            Depenses : <?= $command['cost_command'] ?> €
          </p>
          <hr>

          <strong><i class="fa fa-calendar margin-r-5"></i> Date</strong>
          <p><?= $command['command_date_fr']?></p>
          <hr>

          <strong><i class="fa fa-pencil margin-r-5"></i> Description</strong>
          <p class="text-center"><?= $command['description_command'] ?></p>
          <hr>

          <div>
            <?php $modalMsg = "Êtes vous sûr de vouloir supprimer commande?"; ?>
            <a data-href="index.php?action=removeCommand&amp;id=<?= $command['id_command'] ?>" class="btn btn-danger pull-left" data-toggle="modal" data-target="#modalShow"><b><i class="fa fa-trash-o"></i></b></a>
            <a href="index.php?action=modifyCommandPage&amp;id=<?= $command['id_command'] ?>" class="btn btn-primary pull-right"><b>Modifier</b></a>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col left -->
    <!-- Main col right-->
    <div class="col-md-4">
      <!-- Client -->
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
          <h3 class="profile-username text-center"><?= $command['name'] ?></h3>
          <p class="text-muted text-center"><?= $command['creation_date'] ?></p>
          <hr>

          <strong><i class="fa fa-phone margin-r-5"></i> <?= $command['tel'] ?></strong>
          <a href="tel:<?= $command['tel'] ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-phone"></i>
          </a>
          <hr>

          <strong><i class="fa fa-envelope margin-r-5"></i> <?= $command['email'] ?></strong>
          <a target="_blank" href="mailto:<?= $command['email'] ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-send"></i>
          </a>
          <hr>

          <strong><i class="fa fa-map margin-r-5"></i> <?= $command['adress'] ?></strong>
          <a target="_blank" href="https://maps.google.com/?q=<?= $mapsAdresseClient = $command['city'] . ' ' . $command['adress']  ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-map-marker"></i>
          </a>
          <hr>

          <strong><i class="fa fa-home margin-r-5"></i> <?= $command['city'] ?></strong>
          <hr>
          <strong><i class="fa  fa-map-signs margin-r-5"></i> <?= $command['post_code'] ?></strong>
          <hr>

          <p class="text-muted text-center"><?= $command['description'] ?></p>
          <hr>

          <div>
            <a href="index.php?action=modifyClientPage&amp;id=<?= $command['id_client'] ?>" class="btn btn-primary pull-left"><b>Modifier</b></a>
            <a href="index.php?action=client&amp;id=<?= $command['id_client'] ?>" class="btn btn-success pull-right"><b>Acceder</b></a>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.right -->
  </div>
</section>
<?php
$content = ob_get_clean();
require('template.php');
