<?php
$title = "Seance | Sunny Moments";
ob_start();
//get the name of the week
$dayofweek = date('w', strtotime(htmlspecialchars($seance['seance_date'])));
$days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday');
$dayOfWeek = $days[$dayofweek];
 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= htmlspecialchars($seance['name'])?>
    <small><?= "Seance ".htmlspecialchars($seance['nom_type']) ?></small>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Date</span>
          <span class="info-box-number"><?= htmlspecialchars($seance['seance_date_fr']). " " .$dayOfWeek ?></span>
          <span class="info-box-text"><?= htmlspecialchars($seance['time_seance']) ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <a class="link-unstyled" href="tel:<?= htmlspecialchars($seance['tel']) ?>">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-phone"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Telephone</span>
            <span class="info-box-number"><?= htmlspecialchars($seance['tel']) ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
      </a>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <a class="link-unstyled" target="_blank" href="https://maps.google.com/?q=<?= $mapsAdresseClient = htmlspecialchars($seance['city_seance']) . ' ' . htmlspecialchars($seance['adresse_seance'])  ?>">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-map"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Adresse</span>
            <span class="info-box-number"><?= htmlspecialchars($seance['city_seance']) ?></span>
            <span class="info-box-text"><?= htmlspecialchars($seance['adresse_seance']) ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
      </a>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Prix</span>
          <span class="info-box-number"><?= htmlspecialchars($seance['prise']) ?> €</span>
          <span class="info-box-text">Depenses <?= $depensesWidget = htmlspecialchars($seance['depenses']) + intval(htmlspecialchars($seance['km'])*0.15) ?> €</span>
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
          <h3 class="box-title">Seance</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body box-profile">
          <h3 class="profile-username text-center">Seance <?= htmlspecialchars($seance['nom_type']) ?></h3>
          <p class="text-muted text-center"><?= htmlspecialchars($seance['creation_date_seance']) ?></p>
          <hr>

          <strong><i class="fa fa-money margin-r-5"></i> Prix : </strong>
          <p>
            Gagne : <?= htmlspecialchars($seance['prise']) ?> €
            <br>
            Depenses : <?= htmlspecialchars($seance['depenses']) ?> €
            <br>
            Depenses + KM : <?= $depensesWidget ?> €
            <br>
            Net : <?= $netSeance = htmlspecialchars($seance['prise']) - $depensesWidget  ?> €
          </p>
          <hr>

          <strong><i class="fa fa-calendar margin-r-5"></i> Date</strong>
          <p>
            <?= htmlspecialchars($seance['seance_date_fr']) ?>
            <br>
            <?= htmlspecialchars($seance['time_seance']) ?>
            <br>
            <?= $dayOfWeek ?>
          </p>
          <hr>

          <strong><i class="fa fa-user margin-r-5"></i> Model</strong>
          <p><?= $seance['model'] ?></p>
          <hr>

          <strong><i class="fa fa-map margin-r-5"></i> Adresse</strong>
          <a target="_blank" href="https://maps.google.com/?q=<?= $mapsAdresseSeance = htmlspecialchars($seance['city_seance']) . ' ' . htmlspecialchars($seance['adresse_seance'])  ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-map-marker"></i>
          </a>
          <p>
            <?= htmlspecialchars($seance['adresse_seance']) ?>
            <br>
            <?= htmlspecialchars($seance['city_seance']) ?>
          </p>
          <hr>

          <strong><i class="fa fa-automobile margin-r-5"></i> Route</strong>
          <p><?= htmlspecialchars($seance['km']) ?> KM</p>
          <hr>

          <strong><i class="fa fa-pencil margin-r-5"></i> Description</strong>
          <p class="text-center"><?= htmlspecialchars($seance['description_seance']) ?></p>

          <?php
          if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1):
          ?>
            <hr>
            <div>
              <?php $modalMsg = "Êtes vous sûr de vouloir supprimer seance?"; ?>
              <a data-href="index.php?action=removeSeance&amp;id=<?= $seance['id_seance'] ?>" class="btn btn-danger pull-left" data-toggle="modal" data-target="#modalShow"><b><i class="fa fa-trash-o"></i></b></a>
              <a href="index.php?action=modifySeancePage&amp;id=<?= $seance['id_seance'] ?>" class="btn btn-primary pull-right"><b>Modifier</b></a>
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
          <h3 class="profile-username text-center"><?= htmlspecialchars($seance['name']) ?></h3>
          <p class="text-muted text-center"><?= htmlspecialchars($seance['creation_date']) ?></p>
          <hr>

          <strong><i class="fa fa-phone margin-r-5"></i> <?= htmlspecialchars($seance['tel']) ?></strong>
          <a href="tel:<?= htmlspecialchars($seance['tel']) ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-phone"></i>
          </a>
          <hr>

          <strong><i class="fa fa-envelope margin-r-5"></i> <?= htmlspecialchars($seance['email']) ?></strong>
          <a target="_blank" href="mailto:<?= htmlspecialchars($seance['email']) ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-send"></i>
          </a>
          <hr>

          <strong><i class="fa fa-map margin-r-5"></i> <?= htmlspecialchars($seance['adress']) ?></strong>
          <a target="_blank" href="https://maps.google.com/?q=<?= $mapsAdresseClient = htmlspecialchars($seance['city']) . ' ' . htmlspecialchars($seance['adress'])  ?>" type="button" class="btn btn-primary btn-sm daterange pull-right">
            <i class="fa fa-map-marker"></i>
          </a>
          <hr>

          <strong><i class="fa fa-home margin-r-5"></i> <?= htmlspecialchars($seance['city']) ?></strong>
          <hr>
          <strong><i class="fa  fa-map-signs margin-r-5"></i> <?= htmlspecialchars($seance['post_code']) ?></strong>
          <hr>

          <p class="text-muted text-center"><?= htmlspecialchars($seance['description']) ?></p>
          <hr>

          <div>
            <?php
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1):
            ?>
              <a href="index.php?action=modifyClientPage&amp;id=<?= $seance['id_client'] ?>" class="btn btn-primary pull-left"><b>Modifier</b></a>
            <?php
            endif;
             ?>
            <a href="index.php?action=client&amp;id=<?= $seance['id_client'] ?>" class="btn btn-success pull-right"><b>Acceder</b></a>
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
