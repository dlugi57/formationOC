<?php
$title = "Commandes | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Commandes
    <small>Control panel</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- Main row -->
  <div class="row">
    <!-- Main col -->
    <section class="col-md-12">
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">Liste des commandes</h3>
          <div class="pull-right box-tools">
            <a type="button" href="index.php?action=addCommandPage" class="btn btn-warning pull-right"><i class="fa fa-plus"></i> Ajouter commande</a>
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
              <th>Prix</th>
              <th>Frais</th>
              <th>Net</th>
              <th>Description</th>
              <th>Date</th>
            </tr>
            </thead>
            <tbody>
              <?php
              while ($data = $commands->fetch()):
              ?>
              <tr class='clickableRowClient' data-href='index.php?action=command&amp;id=<?= $data['id_command'] ?>'>
                <td><?= htmlspecialchars($data['name']) ?></td>
                <td><?= htmlspecialchars($data['nom_type_command']) ?></td>
                <td><?= htmlspecialchars($data['prise_command']) ?> €</td>
                <td><?= htmlspecialchars($data['cost_command']) ?> €</td>
                <td><?= $cashCmdNet = htmlspecialchars($data['prise_command']) - htmlspecialchars($data['cost_command']) ?> €</td>
                <td><?= htmlspecialchars($data['description_command']) ?></td>
                <td><?= htmlspecialchars($data['command_date_fr']) ?></td>
              </tr>
              <?php
              endwhile;
              $commands->closeCursor();
              ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Nom</th>
              <th>Type</th>
              <th>Prix</th>
              <th>Frais</th>
              <th>Net</th>
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
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-eur"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Brut</span>
          <span class="info-box-number"><?= htmlspecialchars($commandsTotal['sumPriseCmd']); ?> €</span>
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
          <span class="info-box-number"><?= $commandsNet = htmlspecialchars($commandsTotal['sumPriseCmd']) - htmlspecialchars($commandsTotal['sumDepCmd']); ?> €</span>
          <div class="progress">
            <div class="progress-bar" style="width: <?= $percentsCmdNet = intval(($commandsNet/htmlspecialchars($commandsTotal['sumPriseCmd']))*100);?>%"></div>
          </div>
          <span class="progress-description"><?= $percentsCmdNet;?> % de gain total</span>
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
          <span class="info-box-number"><?= htmlspecialchars($commandsTotal['sumDepCmd']); ?> €</span>
          <div class="progress">
            <div class="progress-bar" style="width: <?= $percentsCmdDep = intval((htmlspecialchars($commandsTotal['sumDepCmd'])/htmlspecialchars($commandsTotal['sumPriseCmd']))*100);  ?>%"></div>
          </div>
          <span class="progress-description"><?= $percentsCmdDep;  ?> % de gain total</span>
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
          <span class="info-box-number"><?= htmlspecialchars($commandsTotal['totalCmd']) ?></span>
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
