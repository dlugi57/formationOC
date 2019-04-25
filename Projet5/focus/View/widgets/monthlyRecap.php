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
//summary of taxes by month
var arrayFromPHPTaxes = <?php echo json_encode($resultsMonthPaiedTax); ?>;
console.log(arrayFromPHPTaxes);
//summary of cash from month and commands by month
var arrayFromPHPCashNet = <?php echo json_encode($resultsMonthCashNet); ?>;
//summary of all by month
var summarySeanceCmdTaxNet = arrayFromPHPCashNet.map(function (num, idx)
{
  return num - arrayFromPHPTaxes[idx];
})
//summary of all cash depensed brut by month
var arrayFromPHPCash = <?php echo json_encode($resultsMonthCash); ?>;
//summary of numbers of seances by month
var arrayFromPHPNbSeances = <?php echo json_encode($resultsNbSeance); ?>;
//get month from data base
var arrayFromPHPMonth = <?php echo json_encode($resultsMonth); ?>;
//number of clients by month
var arrayFromPHPNb = <?php echo json_encode($resultsNb); ?>;
</script>
