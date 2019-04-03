<?php session_start(); ?>
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>strona glowna</h1>



<a href="index.php?action=listPosts">Retour à la liste des billets</a></br>
<a href="?action=createMember">Create</a></br>

<a href="?action=loginPage">Login</a></br>
<a href="?action=deconnect">Deconexion</a></br>

<?php

if (isset($_SESSION['nick'])) {
  echo "<p>tutaj pokazuje session nick</p>";
  echo $_SESSION['nick'];
}
if (isset($_SESSION['admin'])) {
  if ($_SESSION['admin'] == 1) {
    echo "<p>jestes adminem </p>";
    echo '<a href="?action=createPost">Create Post</a></br>';
    echo $_SESSION['admin'];
  }else {
    echo "<p>jestes pionkiem</p>";
    echo $_SESSION['admin'];
  }

}


?>
<p id="test"></p>
<script type="text/javascript">
  console.log("test w dupke");
  $('#test').html("test");
</script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
