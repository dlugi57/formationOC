<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <!-- HEAD with all metadata -->
    <!-- Le viewport est configuré dans l'en-tête de la page HTML -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Billet simple pour l'Alaska - un nouveau roman de Jean Forteroche sous forme de blog">
    <meta name="keywords" content="Livre, roman, Jean Forteroche">
    <meta name="author" content="Dlugosz Piotr">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="http://piotr.la-gaude.com/Alaska/">
    <meta name="twitter:title" content="Jean Forteroche - Billet simple pour l'Alaska">
    <meta name="twitter:description" content="Billet simple pour l'Alaska - un nouveau roman de Jean Forteroche sous forme de blog">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="http://piotr.la-gaude.com/Alaska/public/images/social-og.jpg">

    <!-- Open Graph data -->
    <meta property="og:title" content="Jean Forteroche - Billet simple pour l'Alaska" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://piotr.la-gaude.com/Alaska/" />
    <meta property="og:image" content="http://piotr.la-gaude.com/Alaska/public/images/social-og.jpg" />
    <meta property="og:description" content="Billet simple pour l'Alaska - un nouveau roman de Jean Forteroche sous forme de blog" />

    <!-- Stylesheets & Scripts for map and fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=wla0vfvhs3281qj2cpgsqhpxll4j76pv2sy1kqiqk4moj66c"></script>

    <!-- Stylesheets from page css-->
    <link href="public/css/style.css" rel="stylesheet" />
    <link href="public/css/header.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="public/images/favicon.ico">

  </head>

  <body>
    <!-- HEADER -->
    <header class="header">
      <!-- Logo -->
      <a href="?action=home"><img src="public/images/logo.png" class="logo" title="" alt=""/></a>
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
          <li><a href="index.php?action=listPosts">Livre</a></li>
          <?php
          //with different authorisation show or hide buttons
          if (isset($_SESSION['admin'])):
            if ($_SESSION['admin'] == 1):
              ?>
              <li><a href="?action=createPost">Nouveau chapitre</a></li>
              <li><a href="?action=commentList">Commentaires</a></li>
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

    <?= $content ?>

    <!-- MODAL -->
    <!-- Modal is visible only few times with deleting and reporting -->
    <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php if (isset($modalMsg)) {echo $modalMsg;} ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
            <a type="" class="btn btn-danger btn-ok">OK</a>
          </div>
        </div>
      </div>
    </div>
    <!-- FOOTER -->
    <footer id="footer">
      <ul class="copyright">
        <li>Copyright © Jean Forteroche</li><li>DESIGN : SUNNY MOMENTS</li>
      </ul>
    </footer>
    <!-- SCRIPTS -->
    <script src="public/js/scripts.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
