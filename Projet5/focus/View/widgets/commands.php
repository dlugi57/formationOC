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
        ?>
        <tr>
          <td><?= $data['nb'] ?></td>
          <td><?= $monthCmdName = date('F', mktime(0, 0, 0, $data['month'], 10)); ?></td>
          <td>
            <div class="progress progress-xs">
              <div class="progress-bar progress-bar-danger" style="width: <?= number_format($percentsCmd)?>%"></div>
            </div>
          </td>
          <td><span class="badge bg-red"><?= $gainedCmd?>/<?= $data['cash']?></span></td>
        </tr>
        <?php
      }
      ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
