<?php
$title = "Ajouter seance | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Ajouter Seance
    <small>Control panel</small>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-4">
      <!-- general form elements disabled -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Ajouter Seance</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="index.php?action=addPhoto" enctype="multipart/form-data">
          <div class="box-body">

            <div class="form-group">
              <?php
              //show error messages from server
              if (isset($_GET['error'])) {
                ?>
                <div class="alert alert-danger" role="alert">
                  <?= $_GET['error'] ?>
                </div>
                <?php
              };
              ?>
              <label for="exampleInputFile">File input</label>
              <input type="file" name="fileToUpload" id="fileToUpload">

              <p class="help-block">Example block-level help text here.</p>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Check me out
              </label>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" value="Upload Image" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>

      </div>
    </div>

    <?php
     $files = glob("Public/gallery/*.*");
     for ($i=0; $i<count($files); $i++)
      {
        $image = $files[$i];
        $supported_file = array(
            'gif',
            'jpg',
            'jpeg',
            'png'
          );

        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if (in_array($ext, $supported_file)) {
        //echo basename($image)."<br />"; // show only image name  if you want to show full path then use this code // echo $image."<br />";
        ?>

        <div class="col-md-4">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><?= basename($image) ?></h3>

              <div class="box-tools pull-right">
                <a href="?action=downloadPhoto&file=<?=urlencode($image) ?>" type="button" class="btn btn-box-tool"><i class="fa fa-minus"></i>
                </a>
                <?php $modalMsg = "Êtes vous sûr de vouloir supprimer le photo ".basename($image)." ?"; ?>
                <a data-href="?action=removePhoto&file=<?=urlencode($image) ?>" type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#modalShow"><i class="fa fa-times"></i></a>
              </div>
            </div>
              <img src="<?= $image ?>" class="img-responsive" alt="Random image" />
          </div>

        </div>

        <?php
        // echo '<img src="'.$image .'" alt="Random image" />'."<br /><br />";
        } else {
            continue;
        }
      }
   ?>






  </div>
</section>
<!-- /.content -->

<?php
$content = ob_get_clean();
require('View/frontend/template.php');
