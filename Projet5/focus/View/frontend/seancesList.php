<?php
$title = "Séances | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Séances
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
          <h3 class="box-title">Liste des séances</h3>
          <div class="pull-right box-tools">
            <a type="button" href="index.php?action=addSeancePage" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Ajouter séance</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
          <table class="seanceTable table table-bordered table-striped table-hover">
            <thead>
            <tr>
              <th>Nom</th>
              <th>Type</th>
              <th>Date</th>
              <th>Heure</th>
              <th>Prix</th>
              <th>Modèle</th>
              <th>Ville</th>
              <th>Adresse</th>
              <th>KM</th>
              <th>Dépenses</th>
              <th>Net</th>
              <th>Description</th>
              <th>Date de création</th>
            </tr>
            </thead>
            <tbody>
              <?php
              while ($data = $seances->fetch()):
              ?>
              <tr class='clickableRowClient' data-href='index.php?action=seance&amp;id=<?= $data['id_seance'] ?>'>
                <td><?= htmlspecialchars($data['name']) ?></td>
                <td><?= htmlspecialchars($data['nom_type']) ?></td>
                <td data-order="<?= $data['seance_date'] ?>"><?= htmlspecialchars($data['seance_date_fr']) ?></td>
                <td><?= htmlspecialchars($data['time_seance']) ?></td>
                <td><?= htmlspecialchars($data['prise']) ?> €</td>
                <td><?= htmlspecialchars($data['model']) ?></td>
                <td><?= htmlspecialchars($data['city_seance']) ?></td>
                <td><?= htmlspecialchars($data['adresse_seance']) ?></td>
                <td><?= htmlspecialchars($data['km']) ?></td>
                <td><?= htmlspecialchars($data['depenses']) ?> €</td>
                <td><?= $senceNetRow = intval(htmlspecialchars($data['prise']) - htmlspecialchars($data['depenses']) -(htmlspecialchars($data['km']) * 0.15)) ?> €</td>
                <td><?= htmlspecialchars($data['description_seance']) ?></td>
                <td><?= htmlspecialchars($data['creation_date']) ?></td>
              </tr>
              <?php
              endwhile;
              $seances->closeCursor();
              ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Nom</th>
              <th>Type</th>
              <th>Date</th>
              <th>Heure</th>
              <th>Prix</th>
              <th>Modèle</th>
              <th>Ville</th>
              <th>Adresse</th>
              <th>KM</th>
              <th>Dépenses</th>
              <th>Net</th>
              <th>Description</th>
              <th>Date de création</th>
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
              <h3 class="box-title">Rapport de séance</h3>

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
                  $totalSeance = htmlspecialchars($cashSummarySeance['sumPrise']);
                  while ($data = $cashTypeSeance->fetch()):
                    $percentsSeances = (htmlspecialchars($data['summaryType'])/$totalSeance)*100;
                    ?>
                    <div class="progress-group">
                      <span class="progress-text"><?= htmlspecialchars($data['nom_type']); ?> <?= number_format($percentsSeances); ?>%</span>
                      <span class="progress-number"><b><?= htmlspecialchars($data['summaryType']); ?></b>/ <?= $totalSeance ?> €</span>
                      <div class="progress sm">
                        <div class="progress-bar <?= htmlspecialchars($data['color_boot']) ?>" style="width: <?= number_format($percentsSeances); ?>%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <?php
                  endwhile;
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
                    <h5 class="description-header"><?= htmlspecialchars($cashSummarySeance['sumPrise']) ?> €</h5>
                    <span class="description-text">TOTAL REVENUES</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header"><?= intval($depSeance = htmlspecialchars($cashSummarySeance['sumDep']) + (htmlspecialchars($cashSummarySeance['sumKm'])*0.15)) ?> €</h5>
                    <span class="description-text">TOTAL FRAIS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header"><?= intval($netSeance = htmlspecialchars($cashSummarySeance['sumPrise']) - (htmlspecialchars($cashSummarySeance['sumDep']) + (htmlspecialchars($cashSummarySeance['sumKm'])*0.15))) ?> €</h5>
                    <span class="description-text">TOTAL GAINS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <h5 class="description-header"><?= htmlspecialchars($cashSummarySeance['sumKm']) ?></h5>
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
var afpMonthSeanceCash = <?php echo json_encode($resultsSeancesCash); ?>;
var afpMonthSeanceDep = <?php echo json_encode($resultsSeancesDepenses); ?>;

</script>
<?php
$content = ob_get_clean();
require('template.php');
