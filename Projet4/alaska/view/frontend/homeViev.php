<?php // session_start(); ?>
<?php $title = "Jean Forteroche - Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<!-- SECTION INTRO -->
<section class="intro">
  <div class="ancre100" id="intro"></div>
  <div class="introBlock" id="introBlock">
    <div id="introDescription">
      <h1 id="introTitle">Billet simple pour l'Alaska</h1>
      <p id="introText">Le nouveau roman de Jean Forteroche</p>
    </div>
  </div>
</section>

<!-- SECTION AUTHOR -->
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

<!-- SECTION BOOK -->
<section id="book">
  <div id="bookDescription">
    <p><a id="last-btn" href="index.php?action=post&amp;id=<?= $lastPost1['id'] ?>">DERNIER CHAPITRE</a></p>
    <h2 id="bookTitle"><?= $lastPost1['title'] ?> </h2>
    <p id="bookText"><?= $lastPost1['content'] ?></p>
    <button type="button" class="btn btn-outline-dark btn-lg btn-perso">VOIR LE LIVRE</button>
  </div>
</section>

<footer id="footer">
  <ul class="copyright">
    <li>Copyright © Jean Forteroche</li><li>DESIGN : SUNNY MOMENTS</li>
  </ul>
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
