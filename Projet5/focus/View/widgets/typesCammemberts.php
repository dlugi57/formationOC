<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Contacte Par</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-8">
        <div class="chart-responsive">
          <canvas id="pieChartContact" height="150"></canvas>
        </div>
        <!-- ./chart-responsive -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <ul class="chart-legend clearfix">
          <?php
          //array to populate data to show
          $contactByArray = array();
          //array with colors of cammemberts
          $colors = array('#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#f56954', '#00a65a', '#f39c12');
          //array with colors of icons next to the cammemberts
          $colorsIcon = array('text-red', 'text-green', 'text-yellow', 'text-aqua', 'text-light-blue', 'text-gray', 'text-red', 'text-green', 'text-yellow');
          //initialize first color
          $colorNumber = 0;
          //fetch of the result
          $result = $contactBy->fetchAll();
          //first of 2 loops client
          foreach($result as $data)
          {
            ?>
            <li><i class="fa fa-circle-o <?= $data['color_dash'];  ?>"></i> <?= $data['nom_contact_by']  ?></li>
            <?php
            //create object to send to the js
            $contactByObj = new stdClass();
            $contactByObj->value = $data['nb'];
            $contactByObj->color = $data['color_camembert'];
            $contactByObj->highlight = $data['color_camembert'];
            $contactByObj->label = $data['nom_contact_by'];
            //change color
            $colorNumber = $colorNumber + 1;
            //put object into array to send to the js
            array_push($contactByArray,$contactByObj);
          };
          ?>
        </ul>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer no-padding">
    <ul class="nav nav-pills nav-stacked">
      <?php
      //initilize loop counter and color
      $loopCounter = 0;
      //second loop client
      foreach($result as $data)
      {
        ?>
        <li><a href="#"><?= $data['nom_contact_by'] ?>
          <span class="pull-right <?= $data['color_dash'];  ?>"> <?= $data['nb'] ?></span></a>
        </li>
        <?php
        //change color and counter
        $loopCounter = $loopCounter + 1;
        //limit of the list lines
        if ($loopCounter === 3)
        {
          break;
        }
      };
      ?>
    </ul>
  </div>
  <!-- /.footer -->
</div>
<!-- /.box -->
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Type session</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-8">
        <div class="chart-responsive">
          <canvas id="pieChart" height="150"></canvas>
        </div>
        <!-- ./chart-responsive -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <ul class="chart-legend clearfix">
          <?php
          //array to populate data to show
          $typeSessionArray = array();
          //fetch of data
          $resultSession = $typeSession->fetchAll();
          //initialize colors
          //$colorSessionNumber = 0;
          //first of two session loops
          foreach ($resultSession as $data)
          {
            ?>
            <li><i class="fa fa-circle-o <?= $data['color_dash'];  ?>"></i> <?= $data['nom_type']  ?></li>
            <?php
            //create object to send to the js
            $typeSessionObj = new stdClass();
            $typeSessionObj->value = $data['nb'];
            $typeSessionObj->color = $data['color_camembert'];
            $typeSessionObj->highlight = $data['color_camembert'];
            $typeSessionObj->label = $data['nom_type'];
            //change color
            //$colorSessionNumber = $colorSessionNumber + 1;
            //put the object into array to send it to the js
            array_push($typeSessionArray,$typeSessionObj);
          }
           ?>
        </ul>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer no-padding">
    <ul class="nav nav-pills nav-stacked">
      <?php
      //initialize counter and color
      $loopSessionCounter = 0;
      //second loop of session
      foreach ($resultSession as $data)
      {
        ?>
         <li><a href="#"><?= $data['nom_type'] ?>
           <span class="pull-right <?= $data['color_dash'];  ?>"> <?= $data['nb'] ?></span></a>
         </li>
        <?php
        //change color and counter
        $loopSessionCounter = $loopSessionCounter + 1;
        if ($loopSessionCounter === 3)
        {
          break;
        }
      }
      ?>
    </ul>
  </div>
  <!-- /.footer -->
</div>
<!-- /.box -->
<script type="text/javascript">
//send data from PHP into JS
var afpContactBy = <?php echo json_encode($contactByArray); ?>;
var afpTypeSession = <?php echo json_encode($typeSessionArray); ?>;
</script>
