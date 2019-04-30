<!-- TABLE: LATEST ORDERS -->
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Seances</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
        <tr>
          <th>Nom</th>
          <th>Date</th>
          <th>Heure</th>
          <th>Type</th>
          <th>Endroit</th>
          <th>Prix</th>
        </tr>
        </thead>
        <tbody>
          <?php
          while ($seance = $seancesList->fetch())
          {
            ?>
            <tr class='clickableRowClient' data-href='index.php?action=seance&amp;id=<?= $seance['id_seance'] ?>'>
              <td><?= $seance['name'] ?></td>
              <td><?= $seance['seance_date_fr'] ?></td>
              <td><?= $seance['time_seance'] ?></td>
              <td><span class="label <?= $seance['color_boot']  ?>"><?= $seance['nom_type'] ?></span></td>
              <td><?= $seance['city_seance'] ?></td>
              <td><?= $seance['prise'] ?> €</td>
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
    <a href="index.php?action=addSeance" class="btn btn-sm btn-danger btn-flat pull-left">Ajouter Seance</a>
    <a href="index.php?action=listSeances" class="btn btn-sm btn-default btn-flat pull-right">Seances List</a>
  </div>
  <!-- /.box-footer -->
</div>
<!-- /.box -->
