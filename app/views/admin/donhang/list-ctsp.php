<br>
<br>
<div class="container">


  <?php
  
  if (isset($thongtin) and !empty($thongtin)) {
    foreach ($thongtin as $key => $value) {
      $MaDH = $value['MaDH'];
      $HoTen = (isset($value['HoTen'])) ? $value['HoTen'] : $value['TenNN'] ;
      $DiaChi = $value['DiaChi'];
      $SDT = $value['SDT'];
      $GhiChu = $value['GhiChu'];
      $trangthai = $value['TenTT'];
    }
  }

  ?>


<div class="container">
  <!-- Title -->
  <div class="d-flex justify-content-between align-items-center py-3">
    <h2 class="h5 mb-0"><a href="#" class="text-muted"></a>Đơn hàng - <?php if (isset($MaDH)) {echo $MaDH;} else {echo 'Đơn hàng trống';} ?></h2>
  </div>

  <!-- Main content -->
  <div class="row">
    <div class="col-lg-8">
      <!-- Details -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="mb-3 d-flex justify-content-between">
            <div>
              <span class="badge rounded-pill bg-info">SHIPPING</span>
            </div>
            <div class="d-flex">
              <div class="dropdown">
                <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> Print</a></li>
                </ul>
              </div>
            </div>
          </div>
          <table class="table table-borderless">
            <tbody>

              <?php
                
                if (isset($sanpham) and !empty($sanpham)) {
                  $total = 0;
                  foreach ($sanpham as $key => $value) {
                    $total = $total + (double)$value['GiaSP'];
                    echo '<tr>
                            <td>
                              <div class="d-flex mb-2">
                                <div class="flex-shrink-0"></div>
                                <div class="flex-lg-grow-1 ms-3">
                                  <h6 class="mb-0">'.$value['TenSP'].'</h6>
                                  <span>Color: '.$value['MauSac'].'</span><br>
                                  <span>Size: '.$value['Size'].'</span>
                                </div>
                              </div>
                            </td>
                            <td>'.$value['SoLuong'].'</td>
                            <td class="text-end">'.$value['GiaSP'].'đ</td>
                          </tr>';
                 }
                }
                
              ?>

            </tbody>
            <tfoot>

              <tr class="fw-bold">
                <td colspan="2">TOTAL</td>
                <td class="text-end"><?php if (isset($total)) {echo $total;} ?>đ</td>
              </tr>

            </tfoot>
          </table>
        </div>
      </div>
      <!-- Payment -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <h3 class="h6">Tổng Hóa Đơn</h3>
              <p>Total: <?php if (isset($total)) {echo $total;} ?>đ 
              <h3 class="h6">Trạng Thái</h3>
              <p class="badge bg-success rounded-pill"><?php if (isset($MaDH)) {echo $trangthai;}  ?></p>
            </div>
            <div class="col-lg-6">
              <h3 class="h6">Địa chỉ</h3>
              <address>
                <strong><?php if (isset($MaDH)) {echo $HoTen;}  ?></strong><br>
                <?php if (isset($MaDH)) {echo $DiaChi;}  ?><br>
                <abbr title="Phone">Phone:</abbr> <?php if (isset($MaDH)) {echo $SDT;}  ?>
              </address>


            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <!-- Customer Notes -->
      <div class="card mb-4">
        <div class="card-body">

          <h3 class="h6">Ghi chú</h3>
          <p><?php if (isset($MaDH)) {echo $GhiChu;} ?></p>

        </div>
      </div>
      <div class="card mb-4">
        <!-- Shipping information -->
        <div class="card-body">
          <h3 class="h4">Thông tin khách hàng</h3>

          <h3 class="h6">Họ và Tên:</h3>
          <p><?php if (isset($MaDH)) {echo $HoTen;}  ?></p>
          <h3 class="h6">Số Điện Thoại:</h3>
          <p><?php if (isset($MaDH)) {echo $SDT;}  ?></p>
          <h3 class="h6">Địa chỉ</h3>
          <address>
          <?php if (isset($MaDH)) {echo $DiaChi;}  ?><br>
          </address>

        </div>
      </div>

      <div class="card mb-4">
        <!-- Shipping information -->
        <div class="card-body">

          <form action="" method="post">
            <label for="exampleSelect1" class="control-label">Cập nhật trạng thái</label>
            <select class="form-control" name="trangthai" id="exampleSelect1">

                  <?php
                    echo '<option>-- Chọn trạng thái --</option>';
                    if (isset($tthai) and !empty($tthai)) {
                      foreach ($tthai as $key => $value) {  
                        echo '<option value="'.$value['MaTT'].'">'.$value['TenTT'].'</option>';    
                      }
                    }
                  ?>

            </select>
            </div>
                <input class="btn btn-save" type="submit" name="submit" value="Lưu Lại">
            </div>
          </form>

        </div>
      </div>


    </div>
    
  </div>
</div>
  </div>