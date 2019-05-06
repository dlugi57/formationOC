<?php
$title = "Jean Forteroche - Billet simple pour l'Alaska";
ob_start();
?>
<!-- SECTION INTRO -->
<section class="intro">
  <div class="ancre100" id="intro"></div>
  <div class="introBlock" id="introBlock">
    <div id="introDescription">
      <h1 id="introTitle">Photographiez plus, travaillez moins!</h1>
      <p id="introText">FOCUS simplifie la gestion de vos séances</p>
    </div>
  </div>
</section>

<!-- SECTION SERVICES -->
<section class="services">
  <!-- break point to get the right position of the section after navbar click -->
  <div class="ancre100" id="services"></div>
  <!-- Services title -->
  <div class="introduction">
    <h2>Organisez, automatisez et profitez!</h2>
    <p>FOCUS est un outil de gestion clients et séances spécialement conçu pour les photographes.<br> Simple d'utilisation et rapide à prendre en main.</p>
  </div>
  <!-- Services content -->
  <div class="content">
    <!-- Services main photo -->
    <div class="photo content-block">
      <img src="Public/img/portrait.jpg" title="Nos services en ligne" alt="services de focus">
    </div>
      <!-- Services descriptions list -->
      <ul class="descriptions content-block">
        <li class="description">
          <h3>Entrez vos données</h3>
          <p>Saisissez facilement vos données: clients, séances, ... tout reste organisé et structuré dans FOCUS.</p>
          <div class="icones">
            <i class="fas fa-calendar-alt fa-2x"></i><br/><i class="fas fa-circle fa-sm"></i>
          </div>
        </li>
        <li class="description">
          <h3>Gagnez du temps</h3>
          <p>FOCUS travaille pour vous: date séances, prix, l'heures ... gagnez du temps et sortez cela de votre tête!</p>
          <div class="icones">
            <i class="fab fa-algolia fa-2x"></i><br/><i class="fas fa-circle fa-sm"></i>
          </div>
        </li>
        <li class="description">
          <h3>Profitez!</h3>
          <p>Profitez du temps gagné pour prendre des photos, trouver des nouveaux clients!</p>
          <div class="icones">
            <i class="fas fa-camera fa-2x"></i><br/><i class="fas fa-circle fa-sm"></i>
          </div>
        </li>
      </ul>
    </div><!-- /content -->
</section>

<!-- SECTION BOOK -->
<section id="book">
  <div id="bookDescription">
    <h2 id="bookTitle">Et si vous commenciez à améliorer votre productivité?</h2>
    <a href="index.php?action=createMember" class="btn btn-outline-dark btn-lg btn-perso">INSCRIVEZ-VOUS</a>
  </div>
</section>

<?php
$content = ob_get_clean();
require('templateHome.php');
