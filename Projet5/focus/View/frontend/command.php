<?php
$title = "Commande | Sunny Moments";
ob_start();
 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= htmlspecialchars($command['name'])?>
    <small><?= "Commande ".htmlspecialchars($command['nom_type_command']) ?></small>
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
          <span class="info-box-number"><?= $command['prise_command']; ?> €</span>
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
          <span class="info-box-number"><?= $commandNet = htmlspecialchars($command['prise_command']) - htmlspecialchars($command['cost_command']); ?> €</span>
          <div class="progress">
            <div class="progress-bar" style="width: <?= $percentCmdNet = intval(($commandNet/htmlspecialchars($command['prise_command']))*100);?>%"></div>
          </div>
          <span class="progress-description"><?= $percentCmdNet;?> % de gain total</span>
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
          <span class="info-box-text">Dépenses</span>
          <span class="info-box-number"><?= htmlspecialchars($command['cost_command']); ?> €</span>
          <div class="progress">
            <div class="progress-bar" style="width: <?= $percentCmdDep = intval((htmlspecialchars($command['cost_command'])/htmlspecialchars($command['prise_command']))*100);  ?>%"></div>
          </div>
          <span class="progress-description"><?= $percentCmdDep;  ?> % de gain total</span>
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
          <span class="info-box-text">Type</span>
          <span class="info-box-number"><?= htmlspecialchars($command['nom_type_command']) ?></span>
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
      <!-- commands-->
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
          <h3 class="profile-username text-center">Commande <?= htmlspecialchars($command['nom_type_command']) ?></h3>
          <p class="text-muted text-center"><?= htmlspecialchars($command['command_date_fr']) ?></p>
          <hr>

          <strong><i class="fa fa-money margin-r-5"></i> Prix</strong>
          <p>
            Gagné : <?= htmlspecialchars($command['prise_command']) ?> €
            <br>
            Dépenses : <?= htmlspecialchars($command['cost_command']) ?> €
          </p>
          <hr>

          <strong><i class="fa fa-calendar margin-r-5"></i> Date</strong>
          <p><?= htmlspecialchars($command['command_date_fr'])?></p>
          <hr>

          <strong><i class="fa fa-pencil margin-r-5"></i> Description</strong>
          <p class="text-center"><?= htmlspecialchars($command['description_command']) ?></p>
          <?php
          if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1):
          ?>
            <hr>
            <div>
              <?php $modalMsg = "Êtes vous sûr de vouloir supprimer commande?"; ?>
              <a data-href="index.php?action=removeCommand&amp;id=<?= $command['id_command'] ?>" class="btn btn-danger pull-left" data-toggle="modal" data-target="#modalShow"><b><i class="fa fa-trash-o"></i></b></a>
              <a href="index.php?action=modifyCommandPage&amp;id=<?= $command['id_command'] ?>" class="btn btn-primary pull-right"><b>Modifier</b></a>
            </div>
          <?php
          endif;
           ?>
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
          <h3 class="profile-username text-center"><?= htmlspecialchars($command['name']) ?></h3>
          <p class="text-muted text-center"><?= htmlspecialchars($command['creation_date']) ?></p>
          <hr>

          <strong><i class="fa fa-phone margin-r-5"></i> <?= htmlspecialchars($command['tel']) ?></strong>
          <a href="tel:<?= htmlspecialchars($command['tel']) ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-phone"></i>
          </a>
          <hr>

          <strong><i class="fa fa-envelope margin-r-5"></i> <?= htmlspecialchars($command['email']) ?></strong>
          <a target="_blank" href="mailto:<?= htmlspecialchars($command['email']) ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-send"></i>
          </a>
          <hr>

          <strong><i class="fa fa-map margin-r-5"></i> <?= htmlspecialchars($command['adress']) ?></strong>
          <a target="_blank" href="https://maps.google.com/?q=<?= $mapsAdresseClient = htmlspecialchars($command['city']) . ' ' . htmlspecialchars($command['adress'])  ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-map-marker"></i>
          </a>
          <hr>

          <strong><i class="fa fa-home margin-r-5"></i> <?= htmlspecialchars($command['city']) ?></strong>
          <hr>
          <strong><i class="fa  fa-map-signs margin-r-5"></i> <?= htmlspecialchars($command['post_code']) ?></strong>
          <hr>

          <p class="text-muted text-center"><?= htmlspecialchars($command['description']) ?></p>
          <hr>

          <div>
            <?php
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1):
            ?>
              <a href="index.php?action=modifyClientPage&amp;id=<?= $command['id_client'] ?>" class="btn btn-primary pull-left"><b>Modifier</b></a>
            <?php
            endif;
             ?>
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
