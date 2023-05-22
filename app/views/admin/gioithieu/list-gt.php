<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách ảnh giới thiệu</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
          
                          <a class="btn btn-add btn-sm" href="<?php echo web_root ?>/admin/introduce/post" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới ảnh giới thiệu</a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã ảnh giới thiệu</th>
                                <th>Ảnh giới thiệu</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if (isset($gioithieu) and !empty($gioithieu)) {
                                    foreach ($gioithieu as $key => $value) {
                                        echo '
                                        <tr>
                                            <td>'.$value['MaGT'].'</td>
                                            <td>'.$value['Img_gt'].'</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm trash" href="'.web_root.'/admin/introduce/delete/'.$value['MaGT'].'" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></a>
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