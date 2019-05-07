<!-- BAR CHART -->
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-bar-chart-o text-gray"></i> Séances & <i class="fa fa-bar-chart text-green"></i> Clients</h3>
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

<script type="text/javascript">
//summary of numbers of seances by month
var arrayFromPHPNbSeances = <?php echo json_encode($resultsNbSeance); ?>;
//get month from data base
var arrayFromPHPMonth = <?php echo json_encode($resultsMonth); ?>;
//number of clients by month
var arrayFromPHPNb = <?php echo json_encode($resultsNb); ?>;
</script>
