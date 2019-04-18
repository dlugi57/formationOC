<?php
$title = "Sunny Moments | Focus";
ob_start();
?>







    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->








      <!-- Main row -->
      <div class="row">

        <section class="col-md-12">
          <?php require('widgets/monthlyRecap.php'); ?>
        </section>
      <!-- /.col -->


        <!-- Left col -->
        <section class="col-lg-8">

          <?php require('widgets/clients.php'); ?>
          <?php require('widgets/seances.php'); ?>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-4">

          <?php require('widgets/typeSession.php') ?>
          <?php require('widgets/contactePar.php') ?>




        </section>
        <!-- right col -->


      </div>
      <!-- /.row (main row) -->

      <h2 class="page-header">Social Widgets</h2>

    <div class="row">

                  <?php require('widgets/insta.php'); ?>
                  <?php require('widgets/fb.php'); ?>
                  <?php require('widgets/site.php'); ?>

    </div>
    <!-- /.row -->

    </section>
    <!-- /.content -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>










<?php
$content = ob_get_clean();
require('template.php');
