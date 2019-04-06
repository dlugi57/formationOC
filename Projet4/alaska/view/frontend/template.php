<?php// session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <!-- HEAD with all metadata -->
        <?php require('view/frontend/head.php'); ?>

    </head>

    <body>
        <?php require('view/frontend/header.php') ?>
        <?php
        if (strpos($_SERVER['REQUEST_URI'], "listPosts") !== false || strpos($_SERVER['REQUEST_URI'], "post") !== false){
          ?>

          <!-- SECTION INTRO -->
          <section class="headline">
            <div class="ancre100" id="intro"></div>
            <div class="headlineBlock" id="headlineBlock">
              <div id="headlineDescription">
                <h1 id="headlineTitle"><?= $title ?></h1>
                <p id="headlineText"><?= $subTitle ?></p>
              </div>
            </div>
          </section>


          <?php
          //require('view/frontend/header.php');
        };
        ?>
        <?php if ($_GET['action'] == 'commentList'): ?>
          <section class="headline">
            <div class="ancre100" id="intro"></div>
            <div class="headlineBlock" id="headlineBlock">
              <div id="headlineDescription">
                <h1 id="headlineTitle"><?= $title ?></h1>
                <p id="headlineText"><?= $subTitle ?></p>
              </div>
            </div>
          </section>
        <?php endif; ?>
        <?= $content ?>


        <footer id="footer">
          <ul class="copyright">
            <li>Copyright © Jean Forteroche</li><li>DESIGN : SUNNY MOMENTS</li>
          </ul>
        </footer>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
