<?php

ob_start();
while ($data = $seances->fetch())
{

?>
<p><?= $data['seance_date_fr'] ?></p>
<?php
}
$seances->closeCursor();

$content = ob_get_clean();
require('template.php');
 ?>
