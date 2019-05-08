<?php
$title = "Modifier taxe | Sunny Moments";
$monthTaxShowEng = date('F', mktime(0, 0, 0, htmlspecialchars($modifyTax['month']), 10));
setlocale (LC_TIME, 'fr_FR.utf8','fra');
$monthTaxShow = utf8_encode(strftime( "%B", strtotime($monthTaxShowEng)));
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= ucfirst($monthTaxShow) ?>
    <small>Modifier taxe</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- general form elements disabled -->
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Modifier taxe</h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="index.php?action=modifyTaxes&amp;id=<?= $modifyTax['tax_id'] ?>">
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
              <input name="tax_date" value="<?= htmlspecialchars($modifyTax['tax_date']) ?>" type="text" class="form-control pull-right addTaxDate" id="datepickerTaxe" autocomplete="off" required>
            </div>
            <span class="help-block"></span>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
          <!-- Prix -->
          <div class="form-group">
            <label>Taxe déclaré</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-eur"></i>
              </div>
              <input name="tax_declare" value="<?= htmlspecialchars($modifyTax['tax_declare']) ?>" type="number" class="form-control addTaxDeclare" required>
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
              <input name="tax_paid" value="<?= htmlspecialchars($modifyTax['tax_paid']) ?>" type="number" class="form-control addTaxPaie" required>
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
            <textarea name="tax_description" class="form-control" rows="3" maxlength="500"><?= htmlspecialchars($modifyTax['tax_description']) ?></textarea>
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
          <button type="submit" class="btn btn-info pull-right addTax">Modifier</button>
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
