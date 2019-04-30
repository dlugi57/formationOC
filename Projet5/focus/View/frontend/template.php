<!DOCTYPE html>
<html>
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
      <span class="logo-mini"><img class="logo-img-small" src="Public/dist/img/logo-rond.png" ></span>
      <!-- logo for regular state and mobile devices
      <span class="logo-lg"><b>Sunny</b>Moments</span>-->
      <span class="logo-lg"><img class="logo-img" src="Public/dist/img/logo.png" ></span>

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
              <img src="Public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Dlugosz Anna</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="Public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Dlugosz Anna - Photographe
                  <small>Depuis 2017</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
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

      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->




      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION  </li>
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
              <?php if(isset($countClients['nb'])){echo '<span class="label label-primary pull-right">'. $countClients['nb'];}else{echo '<i class="fa fa-angle-left pull-right"></i>';}  ?></span>
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
            <span>Seances</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?php if (isset($countSeances['nb'])) {echo $countSeances['nb'];}  ?></small>
              <?php if (isset($countFutureSeances['nb'])) {echo '<small class="label pull-right bg-green">'. $countFutureSeances['nb'];}else{echo '<i class="fa fa-angle-left pull-right"></i>';} ?></small>
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
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?action=listCommands"><i class="fa fa-list-ul"></i> Liste</a></li>
            <li><a href="index.php?action=addCommand"><i class="fa fa-plus"></i> Ajouter</a></li>

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
            <li><a href="pages/charts/morris.html"><i class="fa fa-plus"></i> Ajouter</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-credit-card"></i>
            <span>Achats</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-list-ul"></i> Liste</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-plus"></i> Ajouter</a></li>

          </ul>
        </li>

        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-balance-scale"></i> <span>Test</span>

          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-pdf-o"></i>
            <span>Devis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-list-ul"></i> Liste</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-plus"></i> Ajouter</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil-square-o"></i>
            <span>Factures</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-list-ul"></i> Liste</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-plus"></i> Ajouter</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-picture-o"></i>
            <span>Galeries</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-list-ul"></i> Liste</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-file-image-o"></i> Ajouter</a></li>

          </ul>
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
<footer class="main-footer">
  <div class="pull-right hidden-xs">
  </div>
  <strong>Copyright &copy; 2019 Sunny Moments.</strong> All rights
  reserved.
</footer>
  </div>
  <!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="Public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="Public/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="Public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="Public/bower_components/raphael/raphael.min.js"></script>
<script src="Public/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="Public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="Public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="Public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="Public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="Public/bower_components/moment/min/moment.min.js"></script>
<script src="Public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker                                                                                              -->
<script src="Public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="Public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="Public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="Public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- ChartJS -->
<script src="Public/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE App -->
<script src="Public/dist/js/adminlte.min.js"></script>




<!-- MAIN SCRIPTS -->
<script src="Public/js/ajax.js"></script>
<script src="Public/js/dashboard.js"></script>
<script src="Public/js/backend.js"></script>
<script src="Public/js/seances.js"></script>
<!-- DataTables -->
<script src="Public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="Public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SELECT -->
<script src="Public/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap time picker                                                                                      -->
<script src="Public/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- InputMask -->
<script src="Public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="Public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="Public/plugins/input-mask/jquery.inputmask.extensions.js"></script>

</body>
</html>
