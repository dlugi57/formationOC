<!-- TABLE: Clients -->
<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Clients</h3>
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
          <th>Contact Via</th>
          <th>Ville</th>
        </tr>
        </thead>
        <tbody>
          <?php
          while ($client = $clientsList->fetch())
          {
            ?>
            <tr class='clickableRowClient pagination_dashboard_' data-href='index.php?action=client&amp;id=<?= $client['id_client'] ?>'>
              <td><?= htmlspecialchars($client['name']) ?></td>
              <td><?= htmlspecialchars($client['tel']) ?></td>
              <td><?= htmlspecialchars($client['email']) ?></td>
              <td><span class="label <?= htmlspecialchars($client['color_boot']) ?>"><?= htmlspecialchars($client['nom_contact_by']) ?></span></td>
              <td><?= htmlspecialchars($client['city']) ?></td>
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
      <li><a href="index.php?action=listClients" class="btn btn-sm btn-default btn-flat">Liste des clients</a></li>
      <li><a class="nextBlockDashboard">&raquo;</a></li>
    </ul>
  </div>
  <!-- /.box-footer -->
</div>
<!-- /.box -->
