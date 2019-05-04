<?php
$title = "Accept";
ob_start();
?>

<p>votre demande d'inscription a été envoyée à l'administrateur</p>

<?php
$content = ob_get_clean();
require('templateHome.php');
