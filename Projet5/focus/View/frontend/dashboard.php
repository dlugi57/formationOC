<?php
$title = "Sunny Moments | Focus";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">

    <!-- NET -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= intval(htmlspecialchars($sumNet)) ?><sup style="font-size: 20px">€</sup></h3>
          <p>Net = Seances + CMD - Tax</p>
        </div>
        <div class="icon">
          <i class="fa fa-home"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->

    <!-- BRUT -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= intval(htmlspecialchars($sumBrut)) ?><sup style="font-size: 20px">€</sup></h3>
          <p>Brut = Seances + CMD</p>
        </div>
        <div class="icon">
          <i class="fa fa-money"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->

    <!-- CLIENTS -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?= htmlspecialchars($countClients['nb']) ?></h3>
          <p>Clients</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->

    <!-- SEANCES -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= htmlspecialchars($countSeances['nb']) ?></h3>
          <p>Seances</p>
        </div>
        <div class="icon">
          <i class="fa fa-camera"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->

  <!-- Main row -->
  <div class="row">
    
    <!-- Left col -->
    <section class="col-lg-8">
      <?php require('widgets/clients.php'); ?>
      <?php require('widgets/seances.php'); ?>
      <?php require('widgets/monthlyRecapCash.php'); ?>
      <?php require('widgets/monthlyRecapNb.php'); ?>
    </section>
    <!-- /.Left col -->

    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-4">
      <?php require('widgets/contactCammembert.php') ?>
      <?php require('widgets/typesCammemberts.php') ?>
      <?php require('widgets/commands.php'); ?>
      <?php require('widgets/insta.php'); ?>
      <?php require('widgets/fb.php'); ?>
      <?php // require('widgets/site.php'); ?>
    </section>
    <!-- right col -->
  </div>
  <!-- /.row (main row) -->
</section>
<!-- /.content -->

<?php
$content = ob_get_clean();
require('template.php');
