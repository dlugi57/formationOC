<?php
$title = "Clients | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Clients
    <small>Control panel</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- Main row -->
  <div class="row">
    <!-- Main col -->
    <section class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
              <th>Nom</th>
              <th>Tel</th>
              <th>Email</th>
              <th>Ville</th>
              <th>Adresse</th>
              <th>CP</th>
              <th>Contacte par</th>
              <th>Description</th>
              <th>Date</th>
            </tr>
            </thead>
            <tbody>
              <?php
              while ($data = $clients->fetch())
              {
              ?>
              <tr class='clickableRowClient' data-href='index.php?action=client&amp;id=<?= $data['id_client'] ?>'>
                <td><?= $data['name'] ?></td>
                <td><?= $data['tel'] ?></td>
                <td><?= $data['email'] ?></td>
                <td><?= $data['city'] ?></td>
                <td><?= $data['adress'] ?></td>
                <td><?= $data['post_code'] ?></td>
                <td><?= $data['nom_contact_by'] ?></td>
                <td><?= $data['description'] ?></td>
                <td><?= $data['creation_date_fr'] ?></td>
              </tr>
              <?php
              }
              $clients->closeCursor();
              ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Nom</th>
              <th>Tel</th>
              <th>Email</th>
              <th>Ville</th>
              <th>Adresse</th>
              <th>CP</th>
              <th>Contacte par</th>
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
  </div>
  <!-- /.row (main row) -->
</section>
<!-- /.content -->

<?php
$content = ob_get_clean();
require('template.php');
