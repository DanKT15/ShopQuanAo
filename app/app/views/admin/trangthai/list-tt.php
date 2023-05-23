<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách Trạng Thái</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
          
                          <a class="btn btn-add btn-sm" href="<?php echo web_root ?>/admin/status/post" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới Trạng Thái</a>
                        </div>
                    </div>


                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã trạng thái</th>
                                <th>Tên trạng thái</th>
                                <th>Mô tả trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if (isset($trangthai) and !empty($trangthai)) {
                                    foreach ($trangthai as $key => $value) {
                                        echo '
                                        <tr>
                                            <td>'.$value['MaTT'].'</td>
                                            <td>'.$value['TenTT'].'</td>
                                            <td>'.$value['MoTa'].'</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm trash" href="'.web_root.'/admin/status/delete/'.$value['MaTT'].'" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></a>
                                                <a class="btn btn-primary btn-sm edit" href="'.web_root.'/admin/status/put/'.$value['MaTT'].'" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></a>
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