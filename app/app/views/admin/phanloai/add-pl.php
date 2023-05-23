<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách Phân Loại</li>
        <li class="breadcrumb-item">Thêm Phân Loại</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới phân loại</h3>
          <div class="tile-body">

            <?php
              if (isset($phanloai)) {
                foreach ($phanloai as $key => $value) {
                  $tenloai = $value['TenLoai'];             
                }
              }
            ?>
            
            <form class="row" action="" method="post">

              <div class="form-group col-md-3">
                <label class="control-label">Tên phân loại</label>
                <input class="form-control" name="tenloai" type="text" value="<?php if(isset($tenloai)) echo $tenloai; ?>" required pattern="\S+.*">
              </div>

              </div>
                <input class="btn btn-save" type="submit" name="submit" value="Lưu Lại">
                <a class="btn btn-cancel" href="<?php echo web_root ?>/admin/variety">Hủy bỏ</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
</main>