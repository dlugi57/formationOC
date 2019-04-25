<?php
$title = "Seances | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Seances
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
          <h3 class="box-title">Liste de seances</h3>
          <div class="pull-right box-tools">
            <a type="button" href="index.php?action=addSeance" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Ajouter seance</a>
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
              <th>Date</th>
              <th>Prix</th>
              <th>Ville</th>
              <th>Adresse</th>
              <th>KM</th>
              <th>Depenses</th>
              <th>Description</th>
              <th>Creation Date</th>
            </tr>
            </thead>
            <tbody>
              <?php
              while ($data = $seances->fetch())
              {
              ?>
              <tr class='clickableRowClient' data-href='index.php?action=seance&amp;id=<?= $data['id_seance'] ?>'>
                <td><?= $data['name'] ?></td>
                <td><?= $data['nom_type'] ?></td>
                <td><?= $data['seance_date_fr'] ?></td>
                <td><?= $data['prise'] ?> €</td>
                <td><?= $data['city_seance'] ?></td>
                <td><?= $data['adresse_seance'] ?></td>
                <td><?= $data['km'] ?></td>
                <td><?= $data['depenses'] ?> €</td>
                <td><?= $data['description'] ?></td>
                <td><?= $data['creation_date'] ?></td>
              </tr>
              <?php
              }
              $seances->closeCursor();
              ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Nom</th>
              <th>Type</th>
              <th>Date</th>
              <th>Prix</th>
              <th>Ville</th>
              <th>Adresse</th>
              <th>KM</th>
              <th>Depenses</th>
              <th>Description</th>
              <th>Creation Date</th>
            </tr>
            </tfoot>
          </table>
          </div>
        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Seance rapport</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Gains par mois</strong>
                  </p>
                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="seanceChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Gains par type</strong>
                  </p>
                  <?php
                  $totalSeance = $cashSummarySeance['sumPrise'];
                  while ($data = $cashTypeSeance->fetch())
                  {
                    $percentsSeances = ($data['summaryType']/$totalSeance)*100;
                    ?>
                    <div class="progress-group">
                      <span class="progress-text"><?= $data['nom_type']; ?> <?= number_format($percentsSeances); ?>%</span>
                      <span class="progress-number"><b><?= $data['summaryType']; ?></b>/ <?= $totalSeance ?> €</span>
                      <div class="progress sm">
                        <div class="progress-bar <?= $data['color_boot'] ?>" style="width: <?= number_format($percentsSeances); ?>%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <?php
                  }
                  $cashTypeSeance->closeCursor();
                  ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header"><?= $cashSummarySeance['sumPrise'] ?> €</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header"><?= intval($depSeance = $cashSummarySeance['sumDep'] + ($cashSummarySeance['sumKm']*0.15)) ?> €</h5>
                    <span class="description-text">TOTAL COST</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header"><?= intval($netSeance = $cashSummarySeance['sumPrise'] - ($cashSummarySeance['sumDep'] + ($cashSummarySeance['sumKm']*0.15))) ?> €</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <h5 class="description-header"><?= $cashSummarySeance['sumKm'] ?></h5>
                    <span class="description-text">KM</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.Main col -->
  </div>
  <!-- /.row (main row) -->
</section>
<!-- /.content -->
<script type="text/javascript">

//get month from data base
var afpMonthSeance = <?php echo json_encode($resultsMonthSeance); ?>;
console.log(afpMonthSeance);
var afpMonthSeanceCash = <?php echo json_encode($resultsSeancesCash); ?>;
console.log(afpMonthSeanceCash);
var afpMonthSeanceDep = <?php echo json_encode($resultsSeancesDepenses); ?>;
console.log(afpMonthSeanceDep);

</script>
<?php
$content = ob_get_clean();
require('template.php');
