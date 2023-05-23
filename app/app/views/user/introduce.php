

    <div class="container">
        <div class="container" style="margin-top: 120px;">
            <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giới thiệu</li>
                    </ol>
                </nav><hr>
        </div>
        <p>
            <img src="<?php echo web_root ?>/public/user/imgs/CEO_LVL.jpg" class="img-fluid" alt="...">
            <img src="<?php echo web_root ?>/public/user/imgs/gt_text.jpg" class="img-fluid" alt="...">
            <img src="<?php echo web_root ?>/public/user/imgs/gt_cotmoc.jpg" class="img-fluid" alt="...">

            <?php
                if (isset($gioithieu) && !empty($gioithieu)) {
                    foreach ($gioithieu as $key => $value) {
                        echo '<img src="'.web_root.'/public/uploads/gioithieu/'.$value['Img_gt'].'" class="img-fluid" alt="...">';
                    }
                }
            ?>
            
        </p>
    </div>

