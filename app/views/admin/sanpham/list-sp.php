<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách sản phẩm</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
          
                          <a class="btn btn-add btn-sm" href="<?php echo web_root ?>/admin/product/post" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới sản phẩm</a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Nhà sản xuất</th>
                                <th>Danh mục</th>
                                <th>Loại</th>
                                <th>Tên sản phẩm</th>
                                <th>size</th>
                                <th>Màu sắc</th>
                                <th>Mô tả</th>
                                <th>Tình trạng</th>
                                <th>Số lượng</th>
                                <th>Giá tiền</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if (isset($sanpham) and !empty($sanpham)) {

                                    foreach ($sanpham as $key => $value) {
                                        echo '
                                        <tr>
                                            <td>'.$value['MaSP'].'</td>
                                            <td>'.$value['TenNCC'].'</td>
                                            <td>'.$value['TenDM'].'</td>
                                            <td>'.$value['TenLoai'].'</td>
                                            <td>'.$value['TenSP'].'</td>
                                            <td>'.$value['Size'].'</td>
                                            <td>'.$value['MauSac'].'</td>
                                            <td>'.$value['MotaSP'].'</td>
                                            <td>'.$value['TinhTrang'].'</td>
                                            <td>'.$value['SoLuongSP'].'</td>
                                            <td>'.$value['GiaSP'].'</td>

                                            <td>
                                                <a class="btn btn-primary btn-sm trash" href="'.web_root.'/admin/product/delete/'.$value['MaSP'].'" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></a>
                                                <a class="btn btn-primary btn-sm edit" href="'.web_root.'/admin/product/put/'.$value['MaSP'].'" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-primary btn-sm edit" href="'.web_root.'/admin/image/get/'.$value['MaSP'].'" title="Ảnh" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-image"></i></a>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                }
                                
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
