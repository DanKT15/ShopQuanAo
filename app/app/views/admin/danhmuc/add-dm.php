<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách Danh Mục</li>
        <li class="breadcrumb-item">Thêm Danh Mục</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới danh mục</h3>
          <div class="tile-body">

            <?php
              if (isset($danhmuc)) {
                foreach ($danhmuc as $key => $value) {
                  $tendm = $value['TenDM'];
                  $mota = $value['MoTa'];          
                }
              }
            ?>
            
            <form class="row" action="" method="post">

              <div class="form-group col-md-3">
                <label class="control-label">Tên danh mục</label>
                <input class="form-control" name="tendm" type="text" value="<?php if(isset($tendm)) echo $tendm; ?>" required pattern="\S+.*">
              </div>

              <div class="form-group col-md-12">
                <label class="control-label">Mô tả danh mục</label>
                <textarea class="form-control" name="motadm" id="mota" required pattern="\S+.*"><?php if(isset($mota)) echo $mota; ?></textarea>
                <script>CKEDITOR.replace('mota');</script>
              </div>

              </div>
              <input class="btn btn-save" type="submit" name="submit" value="Lưu Lại">
                <a class="btn btn-cancel" href="<?php echo web_root ?>/admin/category">Hủy bỏ</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
</main>