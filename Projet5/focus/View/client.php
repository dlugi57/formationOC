<?php
$title = "Clients | Sunny Moments";
ob_start();
?>


<p><?= $client['name'] ?></p>



    <?php
    while ($seanceData = $seance->fetch())
    {
      ?>

<p><?= $seanceData['prise'] ?></p>
      <?php


    } ?>

    <?php
    while ($commandData = $command->fetch())
    {
      ?>

<p><?= $commandData['nom_type_command'] ?></p>
      <?php


    } ?>



<?php
$content = ob_get_clean();
require('template.php');
