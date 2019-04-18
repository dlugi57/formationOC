<?php

ob_start();
while ($data = $clients->fetch())
{

?>
<p><?= $data['name'] ?></p>
<?php
}
$clients->closeCursor();

$content = ob_get_clean();
require('template.php');
 ?>
