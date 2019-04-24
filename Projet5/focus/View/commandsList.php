<?php

ob_start();
while ($data = $commands->fetch())
{

?>
<p><?= $data['nom_type_command'] ?></p>
<p><?= $data['name'] ?></p>
<?php
}
$commands->closeCursor();





$content = ob_get_clean();
require('template.php');
 ?>
