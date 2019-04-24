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
$url = 'https://api.instagram.com/v1/users/self/?access_token=6995657814.d948bef.c504d590713243449dd958d4c3b31495';
//$url = 'https://api.instagram.com/v1/users/sunnymoments.photo?access_token=6995657814.d948bef.c504d590713243449dd958d4c3b31495';
$api_response = file_get_contents($url);
$record = json_decode($api_response);
echo $record->data->counts->followed_by;

// if nothing is echoed try
echo '<pre>' . print_r($api_response, true) . '</pre>';
echo '<pre>' . print_r($record, true) . '</pre>';


$content = ob_get_clean();
require('template.php');
 ?>
