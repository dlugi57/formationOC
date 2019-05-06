<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <!-- HEAD with all metadata -->
  <?php require('View/frontend/head.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php?action=dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img class="logo-img-small" src="Public/img/logo-rond.png" ></span>
      <!-- logo for regular state and mobile devices-->
      <span class="logo-lg"><img class="logo-img" src="Public/img/logo.png" ></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
              if (isset($_SESSION['admin']) && ($_SESSION['admin'] == 1)):
              ?>
                <img src="Public/img/profile.jpg" class="user-image" alt="User Image">
              <?php
              endif;
              ?>
              <span class="hidden-xs">
                <?php
                if (isset($_SESSION['nick'])):

                    $nick = $_SESSION['nick'];
                    echo 'Bonjour '.htmlspecialchars($nick);

                endif;
                ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php
                if (isset($_SESSION['admin']) && ($_SESSION['admin'] == 1)):
                ?>
                  <img src="Public/img/profile.jpg" class="img-circle" alt="User Image">
                <?php
                endif;
                ?>
                <p>
                  <?php
                  if (isset($_SESSION['nick'])):

                      $nick = $_SESSION['nick'];
                      echo htmlspecialchars($nick);
                  endif;
                  ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="index.php?action=listClients">Clients</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="index.php?action=listSeances">Séances</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="index.php?action=listCommands">Commands</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?action=home" class="btn btn-default btn-flat">Home</a>
                </div>
                <div class="pull-right">
                  <a href="?action=deconnect" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU  </li>
        <li>
          <a href="index.php?action=dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Clients</span>
            <span class="pull-right-container">
              <?php
              if(isset($countClients['nb'])):
                echo '<span class="label label-primary pull-right">'. htmlspecialchars($countClients['nb']).'</span>';
              else:
                echo '<i class="fa fa-angle-left pull-right"></i>';
              endif;
              ?>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?action=listClients"><i class="fa fa-list-ul"></i> Liste</a></li>
            <li><a href="index.php?action=addClientPage"><i class="fa fa-user-plus"></i> Ajouter</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-camera"></i>
            <span>Séances</span>
            <span class="pull-right-container">
              <?php
              if (isset($countSeances['nb'])):
                echo '<small class="label pull-right bg-yellow">'.htmlspecialchars($countSeances['nb']).'</small>';
              endif;
              if (isset($countFutureSeances['nb'])):
                echo '<small class="label pull-right bg-green">'. htmlspecialchars($countFutureSeances['nb']).'</small>';
              else:
                echo '<i class="fa fa-angle-left pull-right"></i>';
              endif;
              ?>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?action=listSeances"><i class="fa fa-list-ul"></i>Liste</a></li>
            <li><a href="index.php?action=addSeancePage"><i class="fa fa-plus"></i>Ajouter</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Commandes</span>
            <span class="pull-right-container">
              <?php
              if(isset($countCommands['totalCmd'])):
                echo '<span class="label label-primary pull-right">'. htmlspecialchars($countCommands['totalCmd']).'</span>';
              else:
                echo '<i class="fa fa-angle-left pull-right"></i>';
              endif;
              ?>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?action=listCommands"><i class="fa fa-list-ul"></i> Liste</a></li>
            <li><a href="index.php?action=addCommandPage"><i class="fa fa-plus"></i> Ajouter</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-balance-scale"></i>
            <span>Taxes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?action=listTaxes"><i class="fa fa-list-ul"></i> Liste</a></li>
            <li><a href="index.php?action=addTaxesPage"><i class="fa fa-plus"></i> Ajouter</a></li>
          </ul>
        </li>
        <?php
        if (isset($_SESSION['admin']) && ($_SESSION['admin'] == 1)):
        ?>
          <li>
            <a href="index.php?action=membersList">
              <i class="fa fa-user"></i> <span>Members</span>
            </a>
          </li>
        <?php
        endif;
        ?>
        <li>
          <a href="index.php?action=addPhotoPage">
            <i class="fa fa-picture-o"></i> <span>Galerie</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?= $content ?>

  </div>
  <!-- /.content-wrapper -->
  <!-- MODAL -->
  <!-- Modal is visible only few times with deleting and reporting -->
  <div class="modal fade" id="modalShow">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
          <?php
          if (isset($modalMsg)):
            echo $modalMsg;
          endif;
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Retour</button>
          <a type="" class="btn btn-primary btn-ok">OK</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2019 Sunny Moments.</strong> All rights
    reserved.
  </footer>
</div>
  <!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="Public/adminLte/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="Public/adminLte/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="Public/adminLte/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- datepicker -->
<script src="Public/adminLte/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- ChartJS -->
<script src="Public/adminLte/chart.js/Chart.js"></script>
<!-- AdminLTE App -->
<script src="Public/adminLte/adminlte.js"></script>

<!-- MAIN SCRIPTS -->
<script src="Public/js/ajax.js"></script>
<script src="Public/js/dashboard.js"></script>
<script src="Public/js/backend.js"></script>
<script src="Public/js/seances.js"></script>
<!-- DataTables -->
<script src="Public/adminLte/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="Public/adminLte/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SELECT -->
<script src="Public/adminLte/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap time picker-->
<script src="Public/adminLte/timepicker/bootstrap-timepicker.min.js"></script>
<!-- InputMask -->
<script src="Public/adminLte/input-mask/jquery.inputmask.js"></script>
<script src="Public/adminLte/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="Public/adminLte/input-mask/jquery.inputmask.extensions.js"></script>
</body>
</html>
