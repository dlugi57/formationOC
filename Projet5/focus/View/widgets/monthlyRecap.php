<!-- AREA CHART -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-area-chart text-gray"></i> Brut & <i class="fa fa-area-chart text-primary"></i> Net</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="chart">
      <canvas id="areaChart" style="height:250px"></canvas>
    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
<!-- BAR CHART -->
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-bar-chart-o text-gray"></i> Seances & <i class="fa fa-bar-chart text-green"></i> Clients</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="chart">
      <canvas id="barChart" style="height:230px"></canvas>
    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
<?php
//create array to send them into js



/*
*
*
*
*
*
*/

?>
<script type="text/javascript">
var arrayFromPHPCashNet = <?php echo json_encode($resultsMonthCashNet); ?>;
var arrayFromPHPCash = <?php echo json_encode($resultsMonthCash); ?>;
var arrayFromPHPNbSeances = <?php echo json_encode($resultsNbSeance); ?>;
var arrayFromPHPMonth = <?php echo json_encode($resultsMonth); ?>;
var arrayFromPHPNb = <?php echo json_encode($resultsNb); ?>;
</script>
