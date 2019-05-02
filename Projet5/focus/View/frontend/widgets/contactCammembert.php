<div class="box box-primary">
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
          $result = $contactBy->fetchAll();
          //first of 2 loops client
          foreach($result as $data)
          {
            ?>
            <li><i class="fa fa-circle-o <?= htmlspecialchars($data['color_dash']);  ?>"></i> <?= htmlspecialchars($data['nom_contact_by'])  ?></li>
            <?php
            //create object to send to the js
            $contactByObj = new stdClass();
            $contactByObj->value = htmlspecialchars($data['nb']);
            $contactByObj->color = htmlspecialchars($data['color_camembert']);
            $contactByObj->highlight = htmlspecialchars($data['color_camembert']);
            $contactByObj->label = htmlspecialchars($data['nom_contact_by']);
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
        <li><a href="#"><?= htmlspecialchars($data['nom_contact_by']) ?>
          <span class="pull-right <?= htmlspecialchars($data['color_dash']);  ?>"> <?= htmlspecialchars($data['nb']) ?></span></a>
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
<script type="text/javascript">
//send data from PHP into JS
var afpContactBy = <?php echo json_encode($contactByArray); ?>;
</script>
