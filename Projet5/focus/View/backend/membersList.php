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
                <th>Pseudo</th>
                <th>Email</th>
                <th>Date</th>
                <th>Status</th>
                <th>Change status</th>
                <th>Supprimer</th>
              </tr>
              </thead>
              <tbody>
                <?php
                while ($data = $members->fetch())
                {
                  if ($data['admin'] == 0):
                    $statusColor = "label-danger";
                    $statusName = "demandeur";
                    $statusLink = "<a href='index.php?action=status&amp;member_id=". $data['id'] ."&amp;status=2' title='accept Member'><i class='fa fa-user-plus' style='color:green'></i></a>";


                  elseif ($data['admin'] == 1):
                    $statusColor = "label-success";
                    $statusName = "administrateur";
                    $statusLink = "<a href='index.php?action=status&amp;member_id=". $data['id'] ."&amp;status=2'><i class='fa fa-user-times' style='color:orange'></i></a>";
                  elseif ($data['admin'] == 2):
                    $statusColor = "label-warning";
                    $statusName = "utilisateur";
                    $statusLink = "<a href='index.php?action=status&amp;member_id=". $data['id'] ."&amp;status=0'><i class='fa fa-user-times' style='color:red'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?action=status&amp;member_id=". $data['id'] ."&amp;status=1'><i class='fa fa-user-secret' style='color:blue'></i></a>";
                  endif;
                  ?>

                  <tr class="pagination_dashboard_ <?= $statusName ?>">
                    <td><?= htmlspecialchars($data['pseudo']) ?></td>
                    <td><?= htmlspecialchars($data['email']) ?></td>
                    <td><?= htmlspecialchars($data['inscription_date_fr']) ?></td>
                    <td><span class="label <?= $statusColor ?>"><?= htmlspecialchars($statusName) ?></span></td>
                    <td><div class="tools"><?= $statusLink ?></div></td>
                    <?php $modalMsg = "Êtes vous sûr de vouloir supprimer membre?"; ?>
                    <td> <a data-href="index.php?action=removeMember&amp;id=<?= $data['id'] ?>" data-toggle="modal" data-target="#modalShow"><i class="fa fa-trash-o" style='color:red'></i></a> </td>
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


            <div class="btn-group">
              <button id="demandeur" type="button" class="btn btn-default">Demandeurs</button>
              <button id="utilisateur" type="button" class="btn btn-default">Utilisateurs</button>
              <button id="administrateur" type="button" class="btn btn-default">Admins</button>
              <button id="tousMembers" type="button" class="btn btn-primary">Tous</button>
            </div>

          <ul class="pagination pagination-sm no-margin pull-right">
            <li><a class="prevBlockDashboard">&laquo;</a></li>
            <li><a href="index.php?action=listClients" class="btn btn-sm btn-default btn-flat">List</a></li>
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
