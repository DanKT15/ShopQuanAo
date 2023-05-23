<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách Nhà Cung Cấp</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
          
                          <a class="btn btn-add btn-sm" href="<?php echo web_root ?>/admin/provider/post" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới Nhà Cung Cấp</a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã nhà cung cấp</th>
                                <th>Tên nhà cung cấp</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if (isset($nhacungcap) and !empty($nhacungcap)) {
                                    foreach ($nhacungcap as $key => $value) {
                                        echo '
                                        <tr>
                                            <td>'.$value['MaNCC'].'</td>
                                            <td>'.$value['TenNCC'].'</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm trash" href="'.web_root.'/admin/provider/delete/'.$value['MaNCC'].'" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></a>
                                                <a class="btn btn-primary btn-sm edit" href="'.web_root.'/admin/provider/put/'.$value['MaNCC'].'" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></a>
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