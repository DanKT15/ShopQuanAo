<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo web_root ?>/public/user/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo web_root ?>/public/user/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Document</title>
</head>
<body >
<div class="container">

  
    <!-- menu -->
  
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container"  >
          <nav class="navbar navbar-expand-lg bg-body-tertiary" >
            <div class="container-fluid" >
              <a class="navbar-brand " href="./index.php"><img class="img-logo" src="<?php echo web_root ?>/public/user/imgs/logo.png" alt="#"></a>
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo web_root ?>">Trang Chủ</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo web_root ?>/home/introduce">Giới Thiệu</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Sản phẩm
                    </a>
                    <ul class="dropdown-menu">

                      <?php
                        if (isset($phanloai) && !empty($phanloai)) {
                          foreach ($phanloai as $key => $value) {
                            echo '<li><a class="dropdown-item" href="'.web_root.'/product/gender/'.$value['TenLoai'].'">'.$value['TenLoai'].'</a></li>';
                          }
                        }
                      ?>
                      
                    </ul>
                  </li>   
                </ul>
                
            </div>
            </div>
          </nav>

        
        
      <div class="row">
        <div class="col-9">
          <!-- form nhap du lieu tim kiem -->
            <!-- xu ly ham tim kiem o controller product -->
            <!-- chuyen du lieu qua controller bang method = POST
            input nhap du lieu voi name = search -->
            <form class="d-flex" action="<?php echo web_root ?>/product/search" role="search" method="POST">
              <input class="form-control" type="text" placeholder="Tìm kiếm sản phẩm" aria-label="Search" name="search">
              <button class="btn btn-dark " type="submit"><i class="uil uil-search text-white"></i></button>
            </form>
          </div>

          <div class="col-1">

            <?php
              if (isset($_SESSION['ss_user_token'])) {
                echo '<a href="'.web_root.'/account/logout">
                        <span class="fs-3 uil uil-user-times"></span>
                    </a>';
              }else {
                echo '<a href="'.web_root.'/account/login">
                        <span class="fs-3 uil uil-user"></span>
                    </a>';
              }
            ?>

          </div>
          <!-- <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"> -->
              <!-- <span class="uil uil-shopping-cart-alt"></span> -->

          <div class="col-1">
              <a href="#" class=" position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="fs-3 uil uil-shopping-cart-alt"></span>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pll bg-dark">
                      0
                    </span>
              </a>
            <!-- </button> -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Giỏ hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="breadcrumb d-block">

                



          


     
         
    


  