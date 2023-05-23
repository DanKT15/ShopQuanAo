<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách ảnh banner</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
          
                          <a class="btn btn-add btn-sm" href="<?php echo web_root ?>/admin/banner/post" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới ảnh banner</a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã ảnh banner</th>
                                <th>Ảnh banner</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if (isset($banner) and !empty($banner)) {
                                    foreach ($banner as $key => $value) {
                                        echo '
                                        <tr>
                                            <td>'.$value['MaBN'].'</td>
                                            <td>'.$value['HinhAnh_banner'].'</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm trash" href="'.web_root.'/admin/banner/delete/'.$value['MaBN'].'" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></a>
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