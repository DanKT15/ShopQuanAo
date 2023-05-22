
    <!-- inf -->
    <div class="container ">
        <div class="container" style="margin-top: 120px;">
            <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                    </ol>
                </nav><hr>
        </div>

        <!-- <div class="pay-inf">
            <h2 class="list-product-title">Thông tin mua hàng</h2>
    
            <form action="" method="post">
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Tên người nhận:</label>
                    <input type="text" class="form-control" id="name" placeholder="" name="name" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="tel" class="form-label">Số điện thoại:</label>
                    <input type="tel" class="form-control" id="txtTelephone" placeholder="" name="txtTelephone" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="adress" class="form-label">Địa chỉ nhận hàng:</label>
                    <input type="adress" class="form-control" id="adress" placeholder="Địa chỉ cụ thể: Số nhà, đường/ấp,.." name="adress" required>
                </div>
            </form>



        </div> -->

<!-- buy -->
        <div class="buys" style="margin-top: 100px;">
            <h2 class="list-product-title">Thanh toán đơn hàng</h2>
            
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Thông tin sản phẩm</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            if (isset($donhang) && !empty($donhang)) {
                                $tong = 0;
                                foreach ($donhang as $key => $value) {
                                    echo '<form action="" method="post"> 
                                            <tr> 
                                                <th scope="row">'.$key.'</th>
                                                <td style="width: 540px">
                                                    <div class="card mb-3" style="max-width: 540px; border: none; ">
                                                            <div class="row g-0" style="border: none;">
                                                                    <div class="col-md-2">
                                                                        <a href="#"><img src="'.web_root.'/public/uploads/product/'.$value['Img_sp'].'" class="img-fluid rounded-start" alt="..."></a>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="card-body prd-pay">
                                                                                <a href="#" style="font-size: 14px;">'.$value['TenSP'].'</a>
                                                                                <div class="">
                                                                                    <span class="card-text d-block" style="font-size: 12px;"><small class="text-muted">Màu sắc: '.$value['MauSac'].'</small></span>
                                                                                    <span class="card-text d-block" style="font-size: 12px;"><small class="text-muted">Size: '.$_SESSION['giohang'][$value['MaSP']]['size'].'</small></span>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                                </td>
                                                <td>'.$value['GiaSP'].'VND</td>
                                                <td><input type="number" id="quantity" name="quantity" min="1" max="'.$value['SoLuongSP'].'" value="'.$_SESSION['giohang'][$value['MaSP']]['soluong'].'" required></td>
                                                <td>'.$value['GiaSP'] * $_SESSION['giohang'][$value['MaSP']]['soluong'].'VND</td>
                                                <td>              
                                                    <input type="hidden" name="idgh" value="'.$value['MaSP'].'">
                                                    <button name="capnhat" type="submit" class="btn btn-outline-dark uil-edit-alt"></button>      
                                                    
                                                    <a href="'.web_root.'/cart/delete/'.$value['MaSP'].'" class="btn btn-outline-danger uil-trash-alt"></a>
                                                </td>  
                                            </tr>
                                        </form>';
                                    
                                    $tong += $value['GiaSP']*$_SESSION['giohang'][$value['MaSP']]['soluong'];
                                }
                            }
                            // <button type="button" class="btn btn-outline-danger uil-trash-alt"></button>
                        ?>
                        
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Tổng: <a href="#" class="text-dark " style="text-decoration:none;"><?php echo $req = (isset($tong)) ? $tong : 0 ; ?>VND</a></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>



                <div>
                    
                <?php
                    
                        if (isset($taikhoan) && !empty($taikhoan)) {
                            foreach ($taikhoan as $key => $value) {
                                echo '<div class="pay-inf">
                                        <h2 class="list-product-title">Thông tin mua hàng</h2>
                                
                                        <form action="" method="post">
                                            <div class="mb-3 mt-3">
                                                <label for="text" class="form-label">Tên người nhận : '.$value['HoTen'].'</label>                                       
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="tel" class="form-label">Số điện thoại : '.$value['SDT'].'</label>                                      
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="adress" class="form-label">Địa chỉ nhận hàng : '.$value['DiaChi'].'</label>
                                            </div>
                                            <input type="hidden" name="idtk" value="'.$value['MaTK'].'">
                                            <button type="submit" name="thanhtoan" class="btn btn-dark float-end">Đặt hàng</button>
                                        </form>
                                    </div>';
                            }
                        }
                    
                    else {
                        echo '<div class="pay-inf">
                                <h2 class="list-product-title">Thông tin mua hàng</h2>
                        
                                <form action="" method="post">
                                    <div class="mb-3 mt-3">
                                        <label for="text" class="form-label">Tên người nhận:</label>
                                        <input type="text" class="form-control" id="name" placeholder="" name="name" required>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="tel" class="form-label">Số điện thoại:</label>
                                        <input type="tel" class="form-control" id="txtTelephone" placeholder="" name="txtTelephone" required>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="adress" class="form-label">Địa chỉ nhận hàng:</label>
                                        <input type="adress" class="form-control" id="adress" placeholder="Địa chỉ cụ thể: Số nhà, đường/ấp,.." name="adress" required>
                                    </div>
                                    <button type="submit" name="thanhtoan" class="btn btn-dark float-end">Đặt hàng</button>
                                </form>
                            </div>';
                    }
                ?>
                
                    
                    
                    
                    
                </div>
        </div>

  




</div>
      <!--  end show product -->
<style>
    .prd-pay a{
        text-decoration: none;
        color: #333;
    }
</style>
     
      