
    <div class="container">
        <div class="bag">
        
                <?php
                    if (isset($giohang) && !empty($giohang)) {
                        $tong = 0;
                        foreach ($giohang as $key => $value) {
                            echo '<div class="card mb-3" style="max-width: auto;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <a href="#"><img src="'.web_root.'/public/uploads/product/'.$value['Img_sp'].'" class="img-fluid rounded-start" alt="..."></a>
                                </div>
                                <div class="col-md-8">
                                <form action="" method="post">
                                    <button type="submit" class="btn-close" style="float: right;" aria-label="Close"></button>
                                    <input type="hidden" name="idsp" value="'.$value['MaSP'].'">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="" class="name">'.$value['TenSP'].'</a></h5>
                                        <a href="#" class="card-text"><small class="text-muted">Màu sắc: '.$value['MauSac'].'</small></a>
                                        <div class="tong d-flex">
                                            <div class="buy-amount">
                                                <small class="text-mute">
                                                    <i class="uil uil-minus"></i>
                                                    <input type="text" name="amount" id="amount" value="'.$_SESSION['giohang'][$value['MaSP']]['soluong'].'">
                                                    <i class="uil uil-plus"></i>
                                                </small>
                                            </div>
                                            <div class="price">
                                                <a href="#" class="price" style="margin-left: 30px;">'.$value['GiaSP']*$_SESSION['giohang'][$value['MaSP']]['soluong'].'VND</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                </div>
                            </div>   
                        </div>';
                        
                        $tong += $value['GiaSP']*$_SESSION['giohang'][$value['MaSP']]['soluong'];
                        }
                    }
                ?>

                <div class="row align-items-end" style="margin-top: 50px;">
                    <div class="total">
                        <p style="float:right;"><b>
                            Tổng: 
                            <a href="#" class="text-dark " style="text-decoration:none;"><?php echo $req = (isset($tong)) ? $tong : 0 ; ?>VND</a>
                        </b></p>
                    </div>
                    <div class="card-footer text-center">
                        <div class="col align-items-end" >
                            <a href="<?php echo web_root; ?>/cart"><button class="btn btn-dark align-self-end" type="button">Thanh toán</button></a>
                        </div>
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
            border: 1px solid #ccc
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
            border: 1px solid #ccc;
        }

    </style>
   

   </div>
            </div>
          </div>
</div>

</nav>
  <div>
</div>
