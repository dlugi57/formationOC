<!-- HEADER -->
<header class="header">
  <!-- Logo -->
  <a href="?action=home"><img src="Public/img/logo-home.png" class="logo" title="" alt=""/></a>
  <?php
  if (isset($_SESSION['nick']))
  {
      $nick = $_SESSION['nick'];
      echo '<p id="nickHeader">Bonjour '.htmlspecialchars($nick).' </p>';
  }
  ?>
  <!-- Navbar menu -->
  <nav>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
      <?php
      //with different authorisation show or hide buttons
      if (isset($_SESSION['admin'])):
        if ($_SESSION['admin'] == 1 || $_SESSION['admin'] == 2):
          ?>
          <li><a href="?action=dashboard">Dashboard</a></li>
          <?php
        endif;
        ?>
        <li><a href="?action=deconnect">Deconnexion</a></li>
        <?php
      else:
        ?>
        <li><a href="?action=createMember">Inscription</a></li>
        <li><a href="?action=loginPage">Login</a></li>
        <?php
      endif;
      ?>
    </ul>
  </nav>
</header>
