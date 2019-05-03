<?php
$title = "Clients | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Membres
    <small>Control panel</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- Main row -->
  <div class="row">
    <!-- Main col -->
    <!-- TABLE: LATEST ORDERS -->
    <section class="col-lg-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Membres</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-hover no-margin">
              <thead>
              <tr>
                <th>Nom</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Contact par</th>
                <th>Ville</th>
              </tr>
              </thead>
              <tbody>
                <?php
                while ($data = $members->fetch())
                {
                  if ($data['admin'] == 0):
                    $statusColor = "label-danger";
                    $statusName = "demandeur";
                  elseif ($data['admin'] == 1):
                    $statusColor = "label-success";
                    $statusName = "administrateur";
                  else:
                    $statusColor = "label-warning";
                    $statusName = "utilisateur";
                  endif;
                  ?>

                  <tr class='pagination_dashboard_'>
                    <td><?= htmlspecialchars($data['pseudo']) ?></td>
                    <td><?= htmlspecialchars($data['email']) ?></td>
                    <td><?= htmlspecialchars($data['inscription_date_fr']) ?></td>
                    <td><span class="label <?= $statusColor ?>"><?= htmlspecialchars($statusName) ?></span></td>
                  </tr>
                  <?php
                }
                 ?>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a href="index.php?action=addClientPage" class="btn btn-sm btn-warning btn-flat pull-left">Ajouter Client</a>

          <ul class="pagination pagination-sm no-margin pull-right">
            <li><a class="prevBlockDashboard">&laquo;</a></li>
            <li><a href="index.php?action=listClients" class="btn btn-sm btn-default btn-flat">Clients List</a></li>
            <li><a class="nextBlockDashboard">&raquo;</a></li>
          </ul>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </section>
  </div>
  <!-- /.row (main row) -->
</section>
<!-- /.content -->

<?php
$content = ob_get_clean();
require('View/frontend/template.php');
