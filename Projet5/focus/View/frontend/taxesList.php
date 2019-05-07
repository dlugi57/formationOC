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
          <h3 class="box-title">Liste de taxe</h3>
          <div class="pull-right box-tools">
            <a type="button" href="index.php?action=addTaxesPage" class="btn btn-danger pull-right"><i class="fa fa-plus"></i> Ajouter tax</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
          <table class="clientsTable table table-bordered table-striped table-hover">
            <thead>
            <tr>
              <th>Mois</th>
              <th>Déclaré</th>
              <th>Payé</th>
              <th>Pourcentages</th>
              <th>Description</th>
              <th>Année</th>
              <th>Date d'ajout</th>
            </tr>
            </thead>
            <tbody>
              <?php
              while ($data = $taxes->fetch())
              {
                $monthNameEng = date('F', mktime(0, 0, 0, $data['month'], 10));
                setlocale (LC_TIME, 'fr_FR.utf8','fra');
                $monthName = utf8_encode(strftime( "%B", strtotime($monthNameEng)));
              ?>
              <tr class='clickableRowClient' data-href='index.php?action=taxe&amp;id=<?= $data['tax_id'] ?>'>
                <td>(<?= $data['month'] ?>) <?= ucfirst($monthName) ?></td>
                <td><?= htmlspecialchars($data['tax_declare']) ?> €</td>
                <td><?= htmlspecialchars($data['tax_paid']) ?> €</td>
                <td><?= $percentsTaxRow = intval((htmlspecialchars($data['tax_paid'])/htmlspecialchars($data['tax_declare']))*100); ?> %</td>
                <td><?= htmlspecialchars($data['tax_description']) ?></td>
                <td><?= htmlspecialchars($data['year']) ?></td>
                <td><?= htmlspecialchars($data['taxe_date_add']) ?></td>
              </tr>
              <?php
              }
              $taxes->closeCursor();
              ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Mois</th>
              <th>Déclaré</th>
              <th>Payé</th>
              <th>Pourcentages</th>
              <th>Description</th>
              <th>Année</th>
              <th>Date d'ajout</th>
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
          <span class="info-box-text">Déclaré</span>
          <span class="info-box-number"><?= htmlspecialchars($totalTaxes['sumDeclaredTax']) ?> €</span>
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
          <span class="info-box-text">Payé</span>
          <span class="info-box-number"><?= htmlspecialchars($totalTaxes['sumPaidTax']) ?> €</span>
          <div class="progress">
            <div class="progress-bar" style="width: <?= $percentsTax = intval((htmlspecialchars($totalTaxes['sumPaidTax'])/htmlspecialchars($totalTaxes['sumDeclaredTax']))*100);  ?>%"></div>
          </div>
          <span class="progress-description"><?= $percentsTax;  ?> % de l'ensemble déclaré</span>
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
