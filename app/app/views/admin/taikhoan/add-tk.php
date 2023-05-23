<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách Tài Khoản</li>
        <li class="breadcrumb-item">Thêm Tài Khoản</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới tài khoản</h3>
          <div class="tile-body">

            <?php
              if (isset($taikhoan)) {
                foreach ($taikhoan as $key => $value) {
                  $hoten = $value['HoTen'];
                  $diachi = $value['DiaChi'];
                  $sdt = $value['SDT'];
                  $email = $value['Email'];
                  $pass = $value['Pass'];           
                }
              }
            ?>

            <form class="row" action="" method="post">

              <div class="form-group col-md-3">
                <label class="control-label">Họ và Tên</label>
                <input class="form-control" name="hoten" type="text" value="<?php if(isset($hoten)) echo $hoten; ?>" required pattern="\S+.*">
              </div>

              <div class="form-group col-md-3">
                <label class="control-label">Địa Chỉ</label>
                <input class="form-control" name="diachi" type="text" value="<?php if(isset($diachi)) echo $diachi; ?>" required pattern="\S+.*">
              </div>

              <div class="form-group col-md-3">
                <label class="control-label">SDT</label>
                <input class="form-control" name="sdt" type="text" value="<?php if(isset($sdt)) echo $sdt; ?>" required pattern="\S+.*">
              </div>

              <div class="form-group col-md-3">
                <label class="control-label">Email</label>
                <input class="form-control" name="email" type="text" value="<?php if(isset($email)) echo $email; ?>" required pattern="\S+.*">
              </div>

              <div class="form-group col-md-3">
                <label class="control-label">Pass</label>
                <input class="form-control" name="pass" type="text" value="<?php if(isset($pass)) echo $pass; ?>" required pattern="\S+.*">
              </div>

              <div class="form-group col-md-3">
                <label for="exampleSelect1" class="control-label">Quyền</label>
                <select class="form-control" name="quyen" id="exampleSelect1">
                  <option value="">Add Level</option>
                  <option value="0">User</option>
                  <option value="1">Admin</option>
                </select>
              </div>

              </div>
                <input class="btn btn-save" type="submit" name="submit" value="Lưu Lại">
                <a class="btn btn-cancel" href="<?php echo web_root ?>/admin/account">Hủy bỏ</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
</main>