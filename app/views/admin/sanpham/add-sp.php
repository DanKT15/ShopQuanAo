<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách sản phẩm</li>
        <li class="breadcrumb-item"><a href="#">Thêm sản phẩm</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới sản phẩm</h3>
          <div class="tile-body">

            <?php
              if (isset($sanpham)) {
                foreach ($sanpham as $key => $value) {
                  $TenNCC = $value['TenNCC'];
                  $TenDM = $value['TenDM'];
                  $TenLoai = $value['TenLoai'];

                  $MaNCC = $value['MaNCC'];
                  $MaDM = $value['MaDM'];
                  $MaLoai = $value['MaLoai'];

                  $TenSP = $value['TenSP'];
                  $TinhTrang = $value['TinhTrang'];
                  $Size = $value['Size'];
                  $MauSac = $value['MauSac'];
                  $MotaSP = $value['MotaSP'];
      
                  $SoLuongSP = $value['SoLuongSP'];
                  $GiaSP = $value['GiaSP'];       
                }
              }
            ?>
            
            <form class="row" action="" method="post" enctype="multipart/form-data">

              <div class="form-group col-md-3">
                <label class="control-label">Tên sản phẩm</label>
                <input class="form-control" name="tensp" type="text" value="<?php if(isset($TenSP)) echo $TenSP; ?>" required pattern="\S+.*">
              </div>

              <div class="form-group  col-md-3">
                <label class="control-label">Số lượng</label>
                <input class="form-control" name="soluong" type="number" value="<?php if(isset($SoLuongSP)) echo $SoLuongSP; ?>" required pattern="\S+.*">
              </div>

              <div class="form-group col-md-3">
                <label class="control-label">Size</label>
                <input class="form-control" name="size" type="text" value="<?php if(isset($Size)) echo $Size; ?>" required pattern="\S+.*">
              </div>

              <div class="form-group col-md-3">
                <label class="control-label">Màu Sắc</label>
                <input class="form-control" name="color" type="text" value="<?php if(isset($MauSac)) echo $MauSac; ?>" required pattern="\S+.*">
              </div>

              <div class="form-group col-md-3">
                <label for="exampleSelect1" class="control-label">Danh mục</label>
                <select class="form-control" name="danhmuc" id="exampleSelect1">

                  <?php
                    if (isset($TenDM)) {
                      echo '<option value="'.$MaDM.'" selected="selected">'.$TenDM.'</option>';    
                    } else {
                      echo '<option>-- Chọn danh mục --</option>';
                    }

                    if (isset($danhmuc)) {
                      foreach ($danhmuc as $key => $value) {  
                        echo '<option value="'.$value['MaDM'].'">'.$value['TenDM'].'</option>';    
                      }
                    }
                  ?>

                </select>
              </div>

              <div class="form-group col-md-3 ">
                <label for="exampleSelect1" class="control-label">Nhà cung cấp</label>
                <select class="form-control" name="ncc" id="exampleSelect1">
                  
                  <?php
                    if (isset($TenNCC)) {
                      echo '<option value="'.$MaNCC.'" selected="selected">'.$TenNCC.'</option>';    
                    } else {
                      echo '<option>-- Chọn nhà cung cấp --</option>';
                    }
                    
                    if (isset($nhacungcap)) {
                      foreach ($nhacungcap as $key => $value) {  
                        echo '<option value="'.$value['MaNCC'].'">'.$value['TenNCC'].'</option>';    
                      }
                    }
                  ?>
                  
                </select>
              </div>

              <div class="form-group col-md-3 ">
                <label for="exampleSelect1" class="control-label">Loại</label>
                <select class="form-control" name="loai" id="exampleSelect1">
                  
                  <?php
                    if (isset($TenLoai)) {
                      echo '<option value="'.$MaLoai.'" selected="selected">'.$TenLoai.'</option>';    
                    } else {
                      echo '<option>-- Chọn nhà cung cấp --</option>';
                    }

                    if (isset($phanloai)) {
                      foreach ($phanloai as $key => $value) {  
                        echo '<option value="'.$value['MaLoai'].'">'.$value['TenLoai'].'</option>';    
                      }
                    }
                  ?>
                  
                </select>
              </div>

              <div class="form-group col-md-3 ">
                <label for="exampleSelect1" class="control-label">Tình Trạng</label>
                <select class="form-control" name="tinhtrang" id="exampleSelect1">

                  <?php
                    if (isset($TinhTrang)) {
                      echo '<option selected="selected">'.$TinhTrang.'</option>';    
                    } else {
                      echo '<option>-- Tình Trạng SP --</option>';
                    }
                  ?>

                  <option>Còn Hàng</option>
                  <option>Hết Hàng</option>
                </select>
              </div>

              <div class="form-group col-md-3">
                <label class="control-label">Giá bán</label>
                <input class="form-control" name="giasp" type="text" value="<?php if(isset($GiaSP)) echo $GiaSP; ?>" required pattern="\S+.*">
              </div>

              <!-- <div class="form-group col-md-12">
                <label class="control-label">Ảnh sản phẩm</label>
                <div id="myfileupload">
                  <input type="file" id="uploadfile" name="ImageUpload" onchange="readURL(this);" />
                </div>
                <div id="thumbbox">
                  <img height="450" width="400" alt="Thumb image" id="thumbimage" style="display: none" />
                  <a class="removeimg" href="javascript:"></a>
                </div>
                <div id="boxchoice">
                  <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh</a>
                  <p style="clear:both"></p>
                </div>
              </div> -->

              <div class="form-group col-md-12">
                <label class="control-label">Mô tả sản phẩm</label>
                <textarea class="form-control" name="mota" id="mota" required pattern="\S+.*"><?php if(isset($MotaSP)) echo $MotaSP; ?></textarea>
                <script>CKEDITOR.replace('mota');</script>
              </div>

              </div>
                <input class="btn btn-save" type="submit" name="submit" value="Lưu Lại">
                <a class="btn btn-cancel" href="<?php echo web_root ?>/admin/product">Hủy bỏ</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
</main>