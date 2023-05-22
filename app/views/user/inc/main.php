<div class="container text-center" style="margin-top: 110px;" >
    <div id="carouselExampleAutoplaying" class="carousel slide text-center" data-bs-ride="carousel">
      <div class="carousel-inner">

        <?php
          if (isset($banner) && !empty($banner)) {
            foreach ($banner as $key => $value) {
              echo '<div class="carousel-item active">
                    <a href="#"><img src="'.web_root.'/public/uploads/banner/'.$value['HinhAnh_banner'].'" class="d-block w-100 width-banner" alt="hinhanh"></a>
                  </div>';
            }
          }
        ?>

      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- main -->
    <div class="main">
      <div class="sale-up">
        <span title="sale up to 75%">
          <h5 style="margin: 30px auto; font-size: xx-large; text-align: center;">SALE UP TO 75%</h5>
        </span>
        <div>
          <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">IVYmoda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">IVYmen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">IVYkids</a>
            </li>
          </ul>
          <hr  class="">
        </div>
      </div>
          <!-- sale_product -->
          <div class="products-list">
            <ul class="products">

                <?php
                  if (isset($sanpham) && !empty($sanpham)) {
                    foreach ($sanpham as $key => $value) {
                      echo '<li>
                              <div class="products-item" >
                                  <div class="products-top">
                                      <a href="'.web_root.'/product/detail/'.$value['MaSP'].'" class="products-thumb">
                                          <img src="'.web_root.'/public/uploads/product/'.$value['Img_sp'].'" alt="">
                                      </a>
                                      
                                      <a href="'.web_root.'/product/detail/'.$value['MaSP'].'" class="buy-now">Mua ngay</a>
                                  </div>
                                  <div class="products-info">
                                      <a href="'.web_root.'/product/detail/'.$value['MaSP'].'" class="products-name">'.$value['TenSP'].'</a>
                                  </div>
                                  <div class="d-flex align-items-end product-price">
                                </div>
                              </div>
                          </li>';
                    }
                  }
                ?>

              </ul>
              <div class="d-grid gap-2 col-1 mx-auto" style="margin: 30px;">
                <button type="button" class="btn btn-outline-dark" style="border-top-left-radius: 17px; border-bottom-right-radius: 17px;">
                  Xem tất cả
                </button>
              </div>
        </div>
      </div>

        <!---- banner-child -->
        <div class="owl">
          <div class="bnr_center">
            <a href="#"><img src="<?php echo web_root ?>/public/user/imgs/bnr_center.jpg" class="img-fluid" alt="..."></a>
          </div>
          <div class="text-center" style="margin: 30px 0;">
            <div class="row">
              <div class="col align-self-start">
                <a href="#"><img src="<?php echo web_root ?>/public/user/imgs/6.jpg" class="img-fluid bnr" alt=""></a>
              </div>
              <div class="col align-self-end">
                <a href="#"><img src="<?php echo web_root ?>/public/user/imgs/7.jpg" class="img-fluid bnr" alt=""></a>
              </div>
            </div>
          </div>
        </div><hr>

        <!-- gallery -->
        <div class="gallery">
          <span title="gallery">
            <h5 style="margin: 30px auto; font-size: xx-large; text-align: center;">GALLERY</h5>
          </span>
          <div class="products-list">
            <ul class="products">
            <li>
                  <div class="products-item" >
                    <div class="products-top">
                        <a href="" class="products-thumb">
                            <img src="<?php echo web_root ?>/public/user/imgs/8.jpg" alt="">
                        </a>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="products-item" >
                    <div class="products-top">
                        <a href="" class="products-thumb">
                            <img src="<?php echo web_root ?>/public/user/imgs/9.jpg" alt="">
                        </a>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="products-item" >
                    <div class="products-top">
                        <a href="" class="products-thumb">
                            <img src="<?php echo web_root ?>/public/user/imgs/10.jpg" alt="">
                        </a>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="products-item" >
                    <div class="products-top">
                        <a href="" class="products-thumb">
                            <img src="<?php echo web_root ?>/public/user/imgs/11.jpg" alt="">
                        </a>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="products-item" >
                    <div class="products-top">
                        <a href="" class="products-thumb">
                            <img src="<?php echo web_root ?>/public/user/imgs/12.jpg" alt="">
                        </a>
                    </div>
                  </div>
                </li>
            </ul>
          </div>
</div>