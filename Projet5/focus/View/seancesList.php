<?php
$title = "Clients | Sunny Moments";
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

    </section>
    <!-- /.Main col -->
  </div>
  <!-- /.row (main row) -->
</section>
<!-- /.content -->

<?php
$content = ob_get_clean();
require('template.php');
