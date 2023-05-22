<!DOCTYPE html>
<html lang="vi">

<head>
  <title>Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo web_root ?>/public/admin/css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <style>
      body{
      background:#eee;
      }
      .card {
      box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
      }
      .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 0 solid rgba(0,0,0,.125);
      border-radius: 1rem;
      }
      .text-reset {
      --bs-text-opacity: 1;
      color: inherit!important;
      }
      a {
      color: #5465ff;
      text-decoration: none;
      }
</style>
</head>

<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
      
      <!-- User Menu-->
      <li><a class="app-nav__item" href="<?php echo web_root; ?>/account/logout"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user">
        <p class="app-sidebar__user-name"><b>Admin</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
    </div>
    <hr>
    <ul class="app-menu">

      <!-- <li><a class="app-menu__item haha" href="phan-mem-ban-hang.html"><i class='app-menu__icon bx bx-cart-alt'></i>
          <span class="app-menu__label">POS Bán Hàng</span></a></li>
      <li><a class="app-menu__item active" href="index.html"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li> -->

      <li><a class="app-menu__item" href="<?php echo web_root ?>/admin/order"><i class='app-menu__icon bx bx-dollar'></i><span
            class="app-menu__label">Quản lí Đơn Hàng</span></a></li>
      <li><a class="app-menu__item " href="<?php echo web_root ?>/admin/account"><i class='app-menu__icon bx bx-id-card'></i> <span
            class="app-menu__label">Quản lý Tài Khoản</span></a></li>
      <li><a class="app-menu__item" href="<?php echo web_root ?>/admin/product"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Quản lý Sản Phẩm</span></a></li>
      <li><a class="app-menu__item" href="<?php echo web_root ?>/admin/category"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span 
            class="app-menu__label">Quản lý Danh Mục</span></a></li>
      <li><a class="app-menu__item" href="<?php echo web_root ?>/admin/provider"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý Nhà Cung Cấp</span></a></li>
      <li><a class="app-menu__item " href="<?php echo web_root ?>/admin/variety"><i class='app-menu__icon bx bx-id-card'></i> <span
            class="app-menu__label">Quản lý Phân Loại</span></a></li>
      <li><a class="app-menu__item " href="<?php echo web_root ?>/admin/status"><i class='app-menu__icon bx bx-purchase-tag-alt'></i> <span
            class="app-menu__label">Quản lý Trạng Thái</span></a></li>
      <li><a class="app-menu__item" href="<?php echo web_root ?>/admin/banner"><i class='app-menu__icon bx bx-run'></i><span
            class="app-menu__label">Quản lý Banner</span></a></li>
      <li><a class="app-menu__item" href="<?php echo web_root ?>/admin/introduce"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Giới Thiệu</span></a></li>

      <!-- <li><a class="app-menu__item" href=""><i
            class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh thu</span></a></li>
      <li><a class="app-menu__item" href="page-calendar.html"><i class='app-menu__icon bx bx-calendar-check'></i><span
            class="app-menu__label">Lịch công tác </span></a></li>
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span 
            class="app-menu__label">Cài đặt hệ thống</span></a></li> -->
    </ul>
  </aside>