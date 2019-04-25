<?php

ob_start();
while ($data = $taxes->fetch())
{

?>
<p><?= $data['tax_paid'] ?></p>
<p><?= $data['tax_declare'] ?></p>
<?php
}
$taxes->closeCursor();

$content = ob_get_clean();
require('template.php');
 ?>
