<!-- HEADER -->
<header class="header">
  <!-- Logo -->
  <a href="?action=home"><img src="public/images/logo.png" class="logo" title="" alt=""/></a>
  <?php       if (isset($_SESSION['nick'])) {
                $nick = $_SESSION['nick'];
                echo '<p id="nickHeader">Bonjour '.$nick.' </p>';
              } ?>
  <!-- Navbar menu -->
  <nav>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
      <li><a href="index.php?action=listPosts">Livre</a></li>

      <?php
      if (isset($_SESSION['admin'])) {

        if ($_SESSION['admin'] == 1) {

          echo '<li><a href="?action=createPost">Nouveau chapitre</a></li>';


        }
        echo '<li><a href="?action=deconnect">Deconexion</a></li>';
      }else {
        echo '<li><a href="?action=createMember">Inscription</a></li>';
        echo '<li><a href="?action=loginPage">Login</a></li>';
      }
//-----------------------------------------------------------------------------------------------------------------------

      ?>
    </ul>
  </nav>
</header>






<?php
