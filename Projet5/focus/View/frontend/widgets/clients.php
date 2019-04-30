<!-- TABLE: LATEST ORDERS -->

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
          <th>Contact par</th>
          <th>Ville</th>
        </tr>
        </thead>
        <tbody>
          <?php
          while ($client = $clientsList->fetch())
          {
            ?>
            <tr class='clickableRowClient pagination_dashboard_' data-href='index.php?action=client&amp;id=<?= $client['id_client'] ?>'>
              <td><?= $client['name'] ?></td>
              <td><?= $client['tel'] ?></td>
              <td><?= $client['email'] ?></td>
              <td><span class="label <?= $client['color_boot']  ?>"><?= $client['nom_contact_by'] ?></span></td>
              <td><?= $client['city'] ?></td>
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
    <a href="index.php?action=listClients" class="btn btn-sm btn-default btn-flat pull-right">Clients List</a>

    <ul class="pagination pagination-sm no-margin pull-right">
      <li><a class="prevBlockDashboard">&laquo;</a></li>
      <li><a class="tout_afficher_">Tout afficher</a></li>
      <li><a class="nextBlockDashboard">&raquo;</a></li>
    </ul>
  </div>
  <!-- /.box-footer -->
</div>
<!-- /.box -->
<script type="text/javascript">


</script>
