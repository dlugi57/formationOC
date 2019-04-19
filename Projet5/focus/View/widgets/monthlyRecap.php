<!-- AREA CHART -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Area Chart</h3>

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
    <h3 class="box-title">Bar Chart</h3>

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
    $resultsNb = array();
    $resultsMonth = array();
    while ($data = $monthClients->fetch())
    {
      $monthNum  = $data['month'];
      $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
      array_push($resultsNb,$data['nb']);
      array_push($resultsMonth, $monthName);
      //print_r($resultsNb);
    ?>

    <?php
    }

     ?>
     <?php
     $resultsNbSeance = array();
     $resultsMonthCash = array();
     while ($data = $monthSeances->fetch())
     {
       //$monthNumSeance  = $data['month'];
      // $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
       array_push($resultsNbSeance,$data['nb']);
      array_push($resultsMonthCash, $data['cash']);
       print_r($resultsNbSeance);
     ?>

     <?php
     }

      ?>
    <script type="text/javascript">
    var arrayFromPHPCash = <?php echo json_encode($resultsMonthCash); ?>;
    var arrayFromPHPNbSeances = <?php echo json_encode($resultsNbSeance); ?>;
    var arrayFromPHPMonth = <?php echo json_encode($resultsMonth); ?>;
    var arrayFromPHPNb = <?php echo json_encode($resultsNb); ?>;

    </script>
