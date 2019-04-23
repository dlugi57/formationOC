<!-- TABLE: LATEST ORDERS -->
<div class="box box-info">
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
          <th>Type</th>
          <th>Ville</th>
        </tr>
        </thead>
        <tbody>
<?php

while ($seance = $seancesList->fetch()) {
  ?>
  <tr class='clickableRow' data-href='index.php?action=seance&amp;id=<?= $seance['id_seance'] ?>'>
    <td><?= $seance['name'] ?></td>
    <td><?= $seance['seance_date_fr'] ?></td>
    <td><span class="label <?= $seance['color_boot']  ?>"><?= $seance['nom_type'] ?></span></td>
    <td><?= $seance['place'] ?></td>
  </tr>
  <?php
}

 ?>

<!--
        <tr>
          <td><a href="pages/examples/invoice.html">OR1848</a></td>
          <td>Samsung Smart TV</td>
          <td><span class="label label-warning">Pending</span></td>
          <td>
            <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
          </td>
        </tr>
        <tr>
          <td><a href="pages/examples/invoice.html">OR7429</a></td>
          <td>iPhone 6 Plus</td>
          <td><span class="label label-danger">Delivered</span></td>
          <td>
            <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
          </td>
        </tr>
        <tr>
          <td><a href="pages/examples/invoice.html">OR7429</a></td>
          <td>Samsung Smart TV</td>
          <td><span class="label label-info">Processing</span></td>
          <td>
            <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
          </td>
        </tr>
        <tr>
          <td><a href="pages/examples/invoice.html">OR1848</a></td>
          <td>Samsung Smart TV</td>
          <td><span class="label label-warning">Pending</span></td>
          <td>
            <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
          </td>
        </tr>
        <tr>
          <td><a href="pages/examples/invoice.html">OR7429</a></td>
          <td>iPhone 6 Plus</td>
          <td><span class="label label-danger">Delivered</span></td>
          <td>
            <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
          </td>
        </tr>
        <tr>
          <td><a href="pages/examples/invoice.html">OR9842</a></td>
          <td>Call of Duty IV</td>
          <td><span class="label label-success">Shipped</span></td>
          <td>
            <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
          </td>
        </tr>
      -->
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <a href="index.php?action=newSeance" class="btn btn-sm btn-info btn-flat pull-left">Ajouter Seance</a>
    <a href="index.php?action=listSeances" class="btn btn-sm btn-default btn-flat pull-right">Seances List</a>
  </div>
  <!-- /.box-footer -->
</div>
<!-- /.box -->
