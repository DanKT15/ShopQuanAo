<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách đơn hàng</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2"></div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Thời gian đặt</th>
                                <th>Trạng Thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if (isset($donhang) and !empty($donhang)) {
                                    foreach ($donhang as $key => $value) {
                                        echo '
                                        <tr>
                                            <td>'.$value['MaDH'].'</td>
                                            <td>'.$value['NgayMua'].'</td>
                                            <td>'.$value['TenTT'].'</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm edit" href="'.web_root.'/admin/details/get/'.$value['MaDH'].'" title="Chi Tiết" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-file-alt"></i></a>
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