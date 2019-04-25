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
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Recap Report</h3>

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
                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
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
                    <strong>Goal Completion</strong>
                  </p>





                  <div class="progress-group">
                    <span class="progress-text">Add Products to Cart <?= $cashSummarySeance['sumPrise'] ?></span>
                    <span class="progress-number"><b>160</b>/200</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Complete Purchase</span>
                    <span class="progress-number"><b>310</b>/400</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Visit Premium Page</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Send Inquiries</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
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
                    <h5 class="description-header"><?= $cashSummarySeance['sumPrise'] ?></h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header"><?= intval($depSeance = $cashSummarySeance['sumDep'] + ($cashSummarySeance['sumKm']*0.15)) ?></h5>
                    <span class="description-text">TOTAL COST</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header"><?= intval($netSeance = $cashSummarySeance['sumPrise'] - ($cashSummarySeance['sumDep'] + ($cashSummarySeance['sumKm']*0.15))) ?></h5>
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
