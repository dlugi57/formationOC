<?php session_start(); ?>
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>strona glowna</h1>



<a href="index.php?action=listPosts">liste des billets</a></br>


?>
<p id="test"></p>
<script type="text/javascript">
  console.log("test w dupke");
  $('#test').html("test");
</script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
