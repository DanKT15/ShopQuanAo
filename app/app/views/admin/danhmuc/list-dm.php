<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách Danh Mục</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
          
                          <a class="btn btn-add btn-sm" href="<?php echo web_root ?>/admin/category/post" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới Danh Mục</a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã danh mục</th>
                                <th>Tên danh mục</th>
                                <th>Mô tả danh mục</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if (isset($danhmuc) and !empty($danhmuc)) {
                                    foreach ($danhmuc as $key => $value) {
                                        echo '
                                        <tr>
                                            <td>'.$value['MaDM'].'</td>
                                            <td>'.$value['TenDM'].'</td>
                                            <td>'.$value['MoTa'].'</td>

                                            <td>
                                                <a class="btn btn-primary btn-sm trash" href="'.web_root.'/admin/category/delete/'.$value['MaDM'].'" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></a>
                                                <a class="btn btn-primary btn-sm edit" href="'.web_root.'/admin/category/put/'.$value['MaDM'].'" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></a>
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