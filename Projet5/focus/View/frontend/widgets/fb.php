
<!-- Widget: user widget style 1 -->
<div class="box box-widget widget-user">
  <!-- Add the bg color to the header using any of the bg-* classes -->
  <div class="widget-user-header bg-black" style="background: url('<?= $facebook['cover']['source']; ?>') center center;">
    <h3 class="widget-user-username"><?= $facebook['name']; ?></h3>
    <h5 class="widget-user-desc"><?= $facebook['username']; ?></h5>
  </div>
  <div class="widget-user-image">
    <img class="img-circle" src="<?= $facebook['picture']['data']['url']  ?>" alt="User Avatar">
  </div>
  <div class="box-footer">
    <div class="row">
      <div class="col-sm-4 border-right">
        <div class="description-block">
          <h5 class="description-header"><?= $facebook['rating_count']; ?></h5>
          <span class="description-text">VOTES</span>
        </div>
        <!-- /.description-block -->
      </div>
      <!-- /.col -->
      <div class="col-sm-4 border-right">
        <div class="description-block">
          <h5 class="description-header"><?= $facebook['engagement']['count'] ?></h5>
          <span class="description-text">FOLLOWERS</span>
        </div>
        <!-- /.description-block -->
      </div>
      <!-- /.col -->
      <div class="col-sm-4">
        <div class="description-block">
          <h5 class="description-header"><?= $facebook['overall_star_rating']; ?>/5</h5>
          <span class="description-text">RATING</span>
        </div>
        <!-- /.description-block -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</div>
<!-- /.widget-user -->
