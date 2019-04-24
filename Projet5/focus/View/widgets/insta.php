
  <!-- Widget: user widget style 1 -->
  <div class="box box-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-black" style="background: url('Public/dist/img/instagram.jpg') center center;">
      <h3 class="widget-user-username"><?= $instagram->data->full_name; ?></h3>
      <h5 class="widget-user-desc"><?= $instagram->data->username; ?></h5>
    </div>
    <div class="widget-user-image">
      <img class="img-circle" src="<?= $instagram->data->profile_picture; ?>" alt="User Avatar">
    </div>
    <div class="box-footer">
      <div class="row">
        <div class="col-sm-4 border-right">
          <div class="description-block">
            <h5 class="description-header"><?= $instagram->data->counts->media; ?></h5>
            <span class="description-text">POSTS</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4 border-right">
          <div class="description-block">
            <h5 class="description-header"><?= $instagram->data->counts->followed_by; ?></h5>
            <span class="description-text">FOLLOWERS</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4">
          <div class="description-block">
            <h5 class="description-header"><?= $instagram->data->counts->follows; ?></h5>
            <span class="description-text">FOLLOWS</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </div>
  <!-- /.widget-user -->
