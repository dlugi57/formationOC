<?php
$title = "Ajouter taxe | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Ajouter taxe
    <small>Control panel</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- general form elements disabled -->
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Ajouter taxe</h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="index.php?action=addTaxes">
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">

          <!-- Date -->
          <div class="form-group">
            <label>Taxe pour</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input name="tax_date" type="text" class="form-control pull-right addTaxDate" id="datepickerTaxe" required>
            </div>
            <span class="help-block"></span>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
          <!-- Prix -->
          <div class="form-group">
            <label>Taxe déclare</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-eur"></i>
              </div>
              <input name="tax_declare" type="number" class="form-control addTaxDeclare" required>
            </div>
            <span class="help-block"></span>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <!-- Depenses -->
          <div class="form-group">
            <label>Taxe payée</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-money"></i>
              </div>
              <input name="tax_paid" type="number" class="form-control addTaxPaie" required>
            </div>
            <span class="help-block"></span>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
          <!-- textarea -->
          <div class="form-group">
            <label>Description</label>
            <textarea name="tax_description" class="form-control" rows="3" maxlength="500"></textarea>
          </div>
        </div>
        <!--/.col-->
        </div>
        <!--/.row-->
        <div class="box-footer">
          <?php
          //if we can return to the last page show button
          if (isset($_SERVER['HTTP_REFERER'])):
            ?>
            <a class="btn btn-default" href="<?= $_SERVER['HTTP_REFERER'] ?>">Retour</a>
            <?php
          endif;
          ?>
          <button type="submit" class="btn btn-info pull-right addTax">Ajouter</button>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box-body -->
    </form>
  </div>
</section>
<!-- /.content -->

<?php
$content = ob_get_clean();
require('View/frontend/template.php');
