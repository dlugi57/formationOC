<?php
$title = "Accept";
ob_start();
?>

<p>poczekasz ziomeczku na akceptacje</p>

<?php
$content = ob_get_clean();
require('templateHome.php');
