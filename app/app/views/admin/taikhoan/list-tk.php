<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách Tài Khoản</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
          
                          <a class="btn btn-add btn-sm" href="<?php echo web_root ?>/admin/account/post" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới Tài Khoản</a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã tài khoản</th>
                                <th>Họ và Tên</th>
                                <th>Địa Chỉ</th>
                                <th>SDT</th>
                                <th>Email</th>
                                <th>Pass</th>
                                <th>Quyền</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if (isset($taikhoan) and !empty($taikhoan)) {
                                    foreach ($taikhoan as $key => $value) {

                                        if ($value['Quyen'] == 0) {
                                            $level = "User";
                                        }
                                        else {
                                            $level = "Admin";
                                        }

                                        echo '
                                        <tr>
                                            <td>'.$value['MaTK'].'</td>
                                            <td>'.$value['HoTen'].'</td>
                                            <td>'.$value['DiaChi'].'</td>
                                            <td>'.$value['SDT'].'</td>
                                            <td>'.$value['Email'].'</td>
                                            <td>'.$value['Pass'].'</td>
                                            <td>'.$level.'</td>

                                            <td>
                                                <a class="btn btn-primary btn-sm trash" href="'.web_root.'/admin/account/delete/'.$value['MaTK'].'" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></a>
                                                <a class="btn btn-primary btn-sm edit" href="'.web_root.'/admin/account/put/'.$value['MaTK'].'" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></a>
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