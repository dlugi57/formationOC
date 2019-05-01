<?php
$title = "Command | Sunny Moments";
$monthTaxShow = date('F', mktime(0, 0, 0, $taxe['month'], 10));
ob_start();
 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Taxe
    <small><?= "Pour mois de ".$monthTaxShow ?></small>
  </h1>
</section>
<!-- Main content -->
<section class="content">


  <!-- Main row -->
  <div class="row">
    <!-- Main col left-->
    <div class="col-md-6">
      <!-- Seance-->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Taxe</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body box-profile">
          <h3 class="profile-username text-center">Mois <?= $monthTaxShow ?></h3>
          <p class="text-muted text-center"><?= $taxe['tax_date'] ?></p>
          <hr>
          <strong><i class="fa fa-money margin-r-5"></i> Taxe</strong>
          <p>
            Declare : <?= $taxe['tax_declare'] ?> €
            <br>
            Paie : <?= $taxe['tax_paid'] ?> €
          </p>
          <hr>

          <strong><i class="fa fa-calendar margin-r-5"></i> Date ajout</strong>
          <p><?= $taxe['taxe_date_add']?></p>
          <hr>

          <strong><i class="fa fa-pencil margin-r-5"></i> Description</strong>
          <p class="text-center"><?= $taxe['tax_description'] ?></p>
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
    <!-- /.col left -->

  </div>
</section>
<?php
$content = ob_get_clean();
require('template.php');
