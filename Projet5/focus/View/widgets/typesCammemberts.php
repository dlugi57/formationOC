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
          $contactByArray = array();
          $colors = array('#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#f56954', '#00a65a', '#f39c12');
          $colorsIcon = array('text-red', 'text-green', 'text-yellow', 'text-aqua', 'text-light-blue', 'text-gray', 'text-red', 'text-green', 'text-yellow');


          $colorNumber = 0;

          $result = $contactBy->fetchAll(); // PDO



          foreach($result as $data)
          {
            ?>
            <li><i class="fa fa-circle-o <?= $colorsIcon[$colorNumber]  ?>"></i> <?= $data['contact_by']  ?></li>
            <?php
            $contactByObj = new stdClass();
            $contactByObj->value = $data['nb'];
            $contactByObj->color = $colors[$colorNumber];
            $contactByObj->highlight = $colors[$colorNumber];
            $contactByObj->label = $data['contact_by'];
            $colorNumber = $colorNumber + 1;

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
      $loopCounter = 0;
      foreach($result as $data)
      {
        ?>
        <li><a href="#"><?= $data['contact_by'] ?>
          <span class="pull-right <?= $colorsIcon[$loopCounter]  ?>"> <?= $data['nb'] ?></span></a>
        </li>
        <?php
        $loopCounter = $loopCounter + 1;
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

          $typeSessionArray = array();
          $resultSession = $typeSession->fetchAll();
          //$result = $contactBy->fetchAll();

          $colorSessionNumber = 0;
          foreach ($resultSession as $data) {
            ?>
            <li><i class="fa fa-circle-o <?= $colorsIcon[$colorSessionNumber]  ?>"></i> <?= $data['type']  ?></li>
            <?php
            $typeSessionObj = new stdClass();
            $typeSessionObj->value = $data['nb'];
            $typeSessionObj->color = $colors[$colorSessionNumber];
            $typeSessionObj->highlight = $colors[$colorSessionNumber];
            $typeSessionObj->label = $data['type'];
            $colorSessionNumber = $colorSessionNumber + 1;

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
      $loopSessionCounter = 0;
      foreach ($resultSession as $data)
      {
         ?>
         <li><a href="#"><?= $data['type'] ?>
           <span class="pull-right <?= $colorsIcon[$loopSessionCounter]  ?>"> <?= $data['nb'] ?></span></a>
         </li>
        <?php
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
var afpContactBy = <?php echo json_encode($contactByArray); ?>;
var afpTypeSession = <?php echo json_encode($typeSessionArray); ?>;
</script>
