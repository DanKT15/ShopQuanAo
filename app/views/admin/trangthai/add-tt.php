<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách Trạng Thái</li>
        <li class="breadcrumb-item">Thêm Trạng Thái</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới trạng thái</h3>
          <div class="tile-body">

            <?php
              if (isset($trangthai)) {
                foreach ($trangthai as $key => $value) {
                  $tentt = $value['TenTT'];
                  $mota = $value['MoTa'];                     
                }
              }
            ?>
            
            <form class="row" action="" method="post">

              <div class="form-group col-md-3">
                <label class="control-label">Tên trạng thái</label>
                <input class="form-control" name="namett" type="text" value="<?php if(isset($tentt)) echo $tentt; ?>" required pattern="\S+.*">
              </div>

              <div class="form-group col-md-12">
                <label class="control-label">Mô tả trạng thái</label>
                <textarea class="form-control" name="mota" id="mota" required pattern="\S+.*"><?php if(isset($mota)) echo $mota; ?></textarea>
                <script>CKEDITOR.replace('mota');</script>
              </div>

              </div>
                <input class="btn btn-save" type="submit" name="submit" value="Lưu Lại">
                <a class="btn btn-cancel" href="<?php echo web_root ?>/admin/status">Hủy bỏ</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
</main>