
<?php
    print_r($_SESSION['giohang']);
?>;

    <div class="container">
        <div class="container" style="margin-top: 120px;">
            <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="index.php">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                    </ol>
                </nav><hr>
        </div>
        <div class="row">
            <div class="col">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" style="width-min: auto">
                                <div class="carousel-inner">

                                    
                                    <?php
                                        if (isset($sp_img) && !empty($sp_img)) {
                                            foreach ($sp_img as $key => $value) {
                                                echo '<div class="carousel-item active">
                                                        <a href="#"><img src="'.web_root.'/public/uploads/product/'.$value['Img_sp'].'" class="d-block w-100" alt="..."></a>
                                                    </div>';
                                            }
                                        }
                                    ?>

                                </div>
                                <button class="carousel-control-prev text-dark" style="color:#333;" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon text-dark" style="color:#333;" aria-hidden="true"></span>
                                    <span class="visually-hidden text-dark" style="color:#333;">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                        </div>
            </div>
            <div class="col">
                <?php
                    if (isset($sanpham) && !empty($sanpham)) {
                        foreach ($sanpham as $key => $value) {
                            $TenSP = $value['TenSP'];
                            $Size = $value['Size'];
                            $MauSac = $value['MauSac'];
                            $MotaSP = $value['MotaSP'];
                            $SoLuongSP = $value['SoLuongSP'];
                            $GiaSP = $value['GiaSP'];
                        }
                    }
                ?>
                <p class="fs-5 text-uppercase fw-bold"><?php echo $req = (isset($TenSP)) ? $TenSP : "" ; ?></p>
                
                <div class="d-flex align-items-end product-price">
                    <span>Giá : </span>
                    <a href="#" class="new-price"><?php echo $req = (isset($GiaSP)) ? $GiaSP : "" ; ?>VND</a>  
                </div>
                
                <form action="" method="post">
                    <div class="choose-color">
                        <p class="text-muted">Màu sắc: <?php echo $req = (isset($MauSac)) ? $MauSac : "" ; ?></p>
                    </div>

                
                    <div class="choose-size">
                        
                            <p class="text-muted">Kích thước:</p>
                            <?php
                                $req = (isset($Size)) ? $Size : "";
                                if (!empty($req)) {
                                    $size_arr = explode(',', $req);
                                    
                                    foreach ($size_arr as $key => $value) {
                                        echo '<input type="radio" class="btn-check size" name="size" id="option'.$key.'" value="'.trim($value).'" autocomplete="off" required>
                                            <label class="btn btn-outline-dark" for="option'.$key.'">'.trim($value).'</label>';
                                    }
                                }
                            ?>
                        
                    </div>
                    <br>
                    <div class="buy-amount">
                                    <p>Số lượng:</p>
                                    <small class="text-mute">
                                        <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $req = (isset($SoLuongSP)) ? $SoLuongSP : "" ; ?>" required><br><br>
                                    </small>
                    </div>
                    <br>
                    
                    <input type="submit" class="btn btn-outline-dark" name="giohang" value="Thêm vào giỏ hàng">
                    <a href="<?php echo web_root; ?>/cart" class="btn btn-dark" >Mua ngay</a>
                    
                </form>
                
                
                <br>
               <br>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Mô tả chi tiết sản phẩm</button>
                    </li>
                   
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><br><?php echo $req = (isset($MotaSP)) ? $MotaSP : "" ; ?></div>
                   
                    </div>

                
            </div>
            

            
        </div>
    </div>

<style>
    .card-body a{
    text-decoration: none;
    color: #333;
}
.buy-amount button{
    width: 20px;
    height: 20px;
    outline: none;
    border: none;
    background: none;
    cursor: pointer;
}
.buy-amount{
    display: flex;
    border:none;
    margin-top: 10px;
}

.buy-amount button i{
    color:grey;
}
.buy-amount button:hover i{
    color:#4f4f4f;
}
.buy-amount button:hover{
    color: #ccc;
}
.buy-amount #amount{
    width: 35px;
    text-align: center;
    
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          
          
