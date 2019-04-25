<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Commandes</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tr>
        <th style="width: 10px">Qty</th>
        <th>Mois</th>
        <th>Gagne</th>
        <th style="width: 40px">Cash</th>
      </tr>
      <?php
      while ($data = $sumMonthCmd->fetch())
      {
        $percentsCmd = (($data['cash']-$data['paied'])/$data['cash'])*100;
        $gainedCmd = $data['cash']-$data['paied'];
        $colorPercents = "label-info";
        $colorLinePercents = "progress-bar-info";
        if (number_format($percentsCmd) > 90):
          $colorPercents = "label-success";
          $colorLinePercents = "progress-bar-success";
        elseif (number_format($percentsCmd) > 80):
          $colorPercents = "label-primary";
          $colorLinePercents = "progress-bar-primary";
        elseif (number_format($percentsCmd) > 70):
          $colorPercents = "label-info";
          $colorLinePercents = "progress-bar-info";
        elseif (number_format($percentsCmd) > 60):
          $colorPercents = "label-info";
          $colorLinePercents = "progress-bar-info";
        elseif (number_format($percentsCmd) > 50):
          $colorPercents = "label-secondary";
          $colorLinePercents = "progress-bar-secondary";
        elseif (number_format($percentsCmd) > 40):
          $colorPercents = "label-warning";
          $colorLinePercents = "progress-bar-warning";
        elseif (number_format($percentsCmd) <= 40):
          $colorPercents = "label-danger";
          $colorLinePercents = "progress-bar-danger";
        endif;
        ?>
        <tr>
          <td><?= $data['nb'] ?></td>
          <td><?= $monthCmdName = date('F', mktime(0, 0, 0, $data['month'], 10)); ?></td>
          <td>
            <div class="progress progress-xs">
              <div class="progress-bar <?= $colorLinePercents ?>" style="width: <?= number_format($percentsCmd)?>%"></div>
            </div>
          </td>
          <td><span class="badge <?= $colorPercents ?>"><?= $gainedCmd?>/<?= $data['cash']?></span></td>
        </tr>
        <?php
      }
      ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
