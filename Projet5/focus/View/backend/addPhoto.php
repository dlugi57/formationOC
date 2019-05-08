<?php
$title = "Galeire photo | Sunny Moments";
ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Galerie photo
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
          <h3 class="box-title">Ajouter photo</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="index.php?action=addPhoto" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <?php
              //show error messages from server
              if (isset($_GET['error'])):
                ?>
                <div class="alert alert-danger" role="alert">
                  <?= $_GET['error'] ?>
                </div>
                <?php
              endif;
              ?>
              <label for="exampleInputFile">Ajouter photo</label>
              <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" value="Upload Image" name="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </form>
      </div>
    </div>

    <?php
    //show all photos from this folder
    $files = glob("Public/gallery/*.*");
    for ($i=0; $i<count($files); $i++):
      $image = $files[$i];
      $supported_file = array(
            'gif',
            'jpg',
            'jpeg',
            'png'
      );

      $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
      if (in_array($ext, $supported_file)):
        ?>
        <div class="col-md-4">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><?= basename($image) ?></h3>
              <div class="box-tools pull-right">
                <a href="?action=downloadPhoto&file=<?=urlencode($image) ?>" type="button" class="btn btn-box-tool"><i class="fa fa-download"></i>
                </a>
                <?php $modalMsg = "Êtes vous sûr de vouloir supprimer le photo ?"; ?>
                <a data-href="?action=removePhoto&file=<?=urlencode($image) ?>" type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#modalShow"><i class="fa fa-times"></i></a>
              </div>
            </div>
              <img src="<?= $image ?>" class="img-responsive" alt="Random image" />
          </div>
        </div>
        <?php
      else:
        continue;
      endif;
    endfor;
    ?>
  </div>
</section>
<!-- /.content -->

<?php
$content = ob_get_clean();
require('View/frontend/template.php');
