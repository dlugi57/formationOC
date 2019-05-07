
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Type séances</h3>

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
          //first of two session loops
          foreach ($resultSession as $data)
          {
            ?>
            <li><i class="fa fa-circle-o <?= htmlspecialchars($data['color_dash']);  ?>"></i> <?= htmlspecialchars($data['nom_type'])  ?></li>
            <?php
            //create object to send to the js
            $typeSessionObj = new stdClass();
            $typeSessionObj->value = htmlspecialchars($data['nb']);
            $typeSessionObj->color = htmlspecialchars($data['color_camembert']);
            $typeSessionObj->highlight = htmlspecialchars($data['color_camembert']);
            $typeSessionObj->label = htmlspecialchars($data['nom_type']);
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
         <li><a href="#"><?= htmlspecialchars($data['nom_type']) ?>
           <span class="pull-right <?= htmlspecialchars($data['color_dash']);  ?>"> <?= htmlspecialchars($data['nb']) ?></span></a>
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
var afpTypeSession = <?php echo json_encode($typeSessionArray); ?>;
</script>
