<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách hình ảnh</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                          
                          <a class="btn btn-add btn-sm" href="<?php echo web_root; ?>/admin/image/post/<?php echo $idsp; ?>" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới hình ảnh</a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã hình ảnh</th>
                                <th>Mã sản phẩm</th>
                                <th>hình ảnh</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if (isset($hinhanh) and !empty($hinhanh)) {

                                    foreach ($hinhanh as $key => $value) {
                                        echo '
                                        <tr>
                                            <td>'.$value['MaHA'].'</td>
                                            <td>'.$value['MaSP'].'</td>
                                            <td>'.$value['Img_sp'].'</td>

                                            <td>
                                                <a class="btn btn-primary btn-sm trash" href="'.web_root.'/admin/image/delete/'.$value['MaHA'].'" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></a>
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
