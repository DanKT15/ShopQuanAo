<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách Nhà Cung Cấp</li>
        <li class="breadcrumb-item">Thêm Nhà Cung Cấp</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới nhà cung cấp</h3>
          <div class="tile-body">

            <?php
              if (isset($nhacungcap)) {
                foreach ($nhacungcap as $key => $value) {
                  $tenncc = $value['TenNCC'];                    
                }
              }
            ?>
            
            <form class="row" action="" method="post">

              <div class="form-group col-md-3">
                <label class="control-label">Tên Nhà Cung Cấp</label>
                <input class="form-control" name="tenncc" type="text" value="<?php if(isset($tenncc)) echo $tenncc; ?>" required pattern="\S+.*">
              </div>

              </div>
                <input class="btn btn-save" type="submit" name="submit" value="Lưu Lại">
                <a class="btn btn-cancel" href="<?php echo web_root ?>/admin/provider">Hủy bỏ</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
</main>