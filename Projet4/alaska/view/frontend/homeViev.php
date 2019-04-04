<?php // session_start(); ?>
<?php $title = "Jean Forteroche - Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<!-- SECTION SLIDER -->
<section class="intro">
  <div class="ancre100" id="intro"></div>
  <div class="introBlock" id="introBlock">
    <div id="introDescription">
      <h1 id="introTitle">Billet simple pour l'Alaska</h1>
      <p id="introText">Le nouveau roman de Jean Forteroche</p>
    </div>
  </div>
</section>

<section class="author">


  <div class="authorBlock">


    <div id="biography">
      <h2>Jean Forteroche</h2>
      <p>Jean Forteroche né le 21 juin 1948 à Łódź, est un écrivain polonais, auteur d'histoires fantastiques et de fantasy. Il est surtout connu pour sa série littéraire Le Sorceleur qui a ensuite été adaptée en la série de jeu vidéo The Witcher.</p>
    </div>
    <div id="portrait">
      <img src="public/images/portrait.jpeg" alt="">
    </div>
  </div>

</section>

<section id="book">

  <div id="bookDescription">
    <p>DERNIER CHAPITRE</p>
    <h2 id="bookTitle"><?= $lastPost1['title'] ?> </h2>
        <?php //echo '<p>tutaj'.$lastPost1['content'].'</p>'; ?>
    <p id="bookText"><?= $lastPost1['content'] ?></p>
    <p id="bookText1"></p>
  </div>

</section>

<footer id="footer">
  <ul class="copyright">
    <li>Copyright © Jean Forteroche</li><li>DESIGN : SUNNY MOMENTS</li>
  </ul>
</footer>






<?php
/*if (isset($_SESSION['nick'])) {
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

}*/
 ?>



<p id="test"></p>

<script type="text/javascript">
  //console.log("test w dupke");
  //$('#test').html("test");
  $("#test").hide();
</script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
