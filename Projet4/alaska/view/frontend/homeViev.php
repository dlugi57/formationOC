<?php // session_start(); ?>
<?php $title = "Jean Forteroche - Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<!-- SECTION SLIDER -->
<section class="intro">
  <div class="ancre100" id="intro"></div>
  <div class="introBlock" id="introBlock">
    <div id="introescription">
      <h1 id="introTitle">Billet simple pour l'Alaska</h1>
      <p id="introText">Descritpion</p>
    </div>
  </div>
</section>






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
<p>here i will put author section</p>
<script type="text/javascript">
  console.log("test w dupke");
  $('#test').html("test");
</script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
