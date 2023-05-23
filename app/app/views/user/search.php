<?php
// if (isset($test) && !empty($test)) {
//     foreach ($test as $key => $value) {
//         echo $value['MaSP'].'---'.$value['TenSP'].'---'.$value['GiaSP'].'---'.$value['Img_sp'];
//     }
// }
?>

<div class="container">

    <div class="container" style="margin-top: 120px;">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ </a></li>
                <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
            </ol>
        </nav>
        <hr>
    </div>



    <div class="products-all " style="margin-top:30px auto;">
        <nav id="navbar-example2" class="navbar px-3 mb-3">
            <a class="navbar-brand" href="#">Tất cả sản phẩm</a>
            <ul class="nav nav-pills">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Sắp xếp</a>
                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="#scrollspyHeading3">Giá tăng dần<i class="uil uil-arrow-up"></i></a></li>
                        <li><a class="dropdown-item" href="#scrollspyHeading4">Giá giảm dần<i class="uil uil-arrow-down"></i></a></li>

                    </ul>
                </li>
            </ul>
        </nav>

        <ul class="products">


            <?php

            foreach ($search as $key => $sea) {
            ?>

                <li height="600px">

                    <div class="card" style="width: 18rem;height:580px">

                        <img class="card-img-top" src="<?php echo web_root ?>/public/uploads/product/<?php echo $sea['Img_sp'] ?>" alt="Card image cap">

                        <div class="card-body">

                            <h5 class="card-title"><?php echo substr($sea['TenSP'], 0, 30) ?></h5>

                            <p class="card-text"><?php echo number_format($sea['GiaSP'], 0, ',', '.') . 'VND' ?></p>
                            <a href="<?php echo web_root ?>/product/detail/<?php echo $sea['MaSP'] ?>" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>

                </li>

            <?php

            }

            ?>




        </ul>

    </div>
</div>

</div>


<style>
    ul.products li .products-info a {
        display: block;
        text-decoration: none;
        color: #333;
    }

    .nav-center ul li a:hover {
        outline-color: #333;
    }

    ul.products li .products-top a.buy-now {
        text-decoration: none;
    }

    .accordion-item a {
        text-decoration: none;
    }
</style>