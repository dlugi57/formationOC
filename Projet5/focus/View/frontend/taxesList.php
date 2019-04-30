<?php
$title = "Taxes | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Taxes
    <small>Control panel</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- Main row -->
  <div class="row">
    <!-- Main col -->
    <section class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title">Liste de tax</h3>
          <div class="pull-right box-tools">
            <a type="button" href="index.php?action=addTax" class="btn btn-danger pull-right"><i class="fa fa-plus"></i> Ajouter tax</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
          <table class="clientsTable table table-bordered table-striped table-hover">
            <thead>
            <tr>
              <th>Mois</th>
              <th>Declared</th>
              <th>Paid</th>
              <th>Percents</th>
              <th>Description</th>
              <th>Date</th>
            </tr>
            </thead>
            <tbody>
              <?php
              while ($data = $taxes->fetch())
              {
              ?>
              <tr class='clickableRowClient' data-href='index.php?action=command&amp;id=<?= $data['tax_id'] ?>'>
                <td><?= $monthTax = date('F', mktime(0, 0, 0, $data['month'], 10)); ?></td>
                <td><?= $data['tax_declare'] ?> €</td>
                <td><?= $data['tax_paid'] ?> €</td>
                <td><?= $percentsTaxRow = intval(($data['tax_paid']/$data['tax_declare'])*100); ?> %</td>
                <td><?= $data['tax_description'] ?></td>
                <td><?= $data['tax_date'] ?></td>
              </tr>
              <?php
              }
              $taxes->closeCursor();
              ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Mois</th>
              <th>Declared</th>
              <th>Paid</th>
              <th>Percents</th>
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

    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-balance-scale"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Declare</span>
          <span class="info-box-number"><?= $totalTaxes['sumDeclaredTax'] ?> €</span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description"></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="fa fa-money"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Paye</span>
          <span class="info-box-number"><?= $totalTaxes['sumPaidTax'] ?> €</span>
          <div class="progress">
            <div class="progress-bar" style="width: <?= $percentsTax = intval(($totalTaxes['sumPaidTax']/$totalTaxes['sumDeclaredTax'])*100);  ?>%"></div>
          </div>
          <span class="progress-description"><?= $percentsTax;  ?> % of whole declared</span>
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
