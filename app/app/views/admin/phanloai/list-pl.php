<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách Phân Loại</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
          
                          <a class="btn btn-add btn-sm" href="<?php echo web_root ?>/admin/variety/post" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới Phân Loại</a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã phân loại</th>
                                <th>Tên phân loại</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if (isset($phanloai) and !empty($phanloai)) {
                                    foreach ($phanloai as $key => $value) {
                                        echo '
                                        <tr>
                                            <td>'.$value['MaLoai'].'</td>
                                            <td>'.$value['TenLoai'].'</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm trash" href="'.web_root.'/admin/variety/delete/'.$value['MaLoai'].'" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></a>
                                                <a class="btn btn-primary btn-sm edit" href="'.web_root.'/admin/variety/put/'.$value['MaLoai'].'" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></a>
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