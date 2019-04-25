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
              `name``tel``email``adress``city``post_code``contact_by``description``creation_date`
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

              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 4.0
                </td>
                <td>Win 95+</td>
                <td> 4</td>
                <td>X</td>
              </tr>








            </tbody>
            <tfoot>
            <tr>
              <th>Rendering engine</th>
              <th>Browser</th>
              <th>Platform(s)</th>
              <th>Engine version</th>
              <th>CSS grade</th>
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

    <!-- Left col -->
    <section class="col-lg-8">

    </section>
    <!-- /.Left col -->

    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-4">

    </section>
    <!-- right col -->
  </div>
  <!-- /.row (main row) -->

  SOCIAL MEDIA SITE
  <h2 class="page-header">Social Widgets</h2>
  <div class="row">
    <?php // require('widgets/site.php'); ?>
  </div>

</section>
<!-- /.content -->


<script>

</script>
<?php
while ($data = $clients->fetch())
{

?>
<p><?= $data['name'] ?></p>
<?php
}
$clients->closeCursor();
?>
<?php
$content = ob_get_clean();
require('template.php');
 ?>
