
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
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                    </ol>
                </nav><hr>
        </div>
    

    <div class="row">
        <div class="col-3 shadow p-3 mb-5 bg-body-tertiary rounded" style="margin-top:30px">
            <div class="accordion accordion-flush" id="accordionFlushExample">   

                <div class="accordion-item">
                    <!-- <p class="text-uppercase text-center bg-dark text-white">danh mục</p> -->
                    <h2 class="accordion-header" id="flush-headingOne">
                    <!-- <a href="#"> -->
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        danh mục
                        </button>
                    <!-- </a> -->
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="list-group">

                            <?php
                                if (isset($gioitinh) && !empty($gioitinh)) {
                                    $gt = "'".$gioitinh."'";

                                }

                                if (isset($danhmuc) && !empty($danhmuc)) {
                                    foreach ($danhmuc as $key => $value) {
                                        echo '<button class="list-group-item list-group-item-action" onclick="test_ajax('.$value['MaDM'].', '.$gt.')">'.$value['TenDM'].'</button>';
                                    }
                                }
                            ?>
                            
                            <script>
                                function test_ajax(iddm, idgt) {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {

                                            var data = this.responseText;
                                            var obj = JSON.parse(data);

                                            // console.log(obj[0].TenSP);
                                            // console.log(obj);

                                            let element = document.getElementById("ajax");
                                            while (element.firstChild) {
                                                element.removeChild(element.firstChild);
                                            }

                                            let text = ''

                                            for (let x in obj) {

                                                text += '<li>';
                                                text += '<a href="http://localhost:8080/DoAn2/product/detail/' + obj[x].MaSP + '">';
                                                text += '<div class="products-item" >';
                                                text += '<div class="products-top">';
                                                text += '<a href="http://localhost:8080/DoAn2/product/detail/' + obj[x].MaSP + '" class="products-thumb"><img src="http://localhost:8080/DoAn2/public/uploads/product/' + obj[x].Img_sp + '" alt=""></a>';
                                                text += '<a href="http://localhost:8080/DoAn2/product/detail/' + obj[x].MaSP + '" class="buy-now">Mua ngay</a>';
                                                text += '</div>';
                                                text += '<div class="products-info">';
                                                text += '<a href="http://localhost:8080/DoAn2/product/detail/' + obj[x].MaSP + '" class="products-name">' + obj[x].TenSP + '</a>';
                                                text += '</div>';
                                                text += '<div class="d-flex align-items-end product-price">';
                                                text += '<a href="#" class="new-price">Giá :</a><a href="#" class="new-price">' + obj[x].GiaSP + '</a>';
                                                text += '</div>';
                                                text += '</div>';
                                                text += '</a>';
                                                text += '</li>';

                                            }

                                            document.getElementById("ajax").innerHTML = text;
                                        }
                                    };
                                    xmlhttp.open("GET", "http://localhost:8080/DoAn2/product/ajaxtest?iddm=" + iddm + "&idgt=" + idgt, false);
                                    xmlhttp.send();
                                }
                            </script>

                            </div>
                        </div>
                    </div>
                </div>
         
            </div>    
                <div class="check">
                    <p class="text-uppercase text-center bg-dark text-white">Giá</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Dưới 500.000đ
                        </label>
                    </div>
                        <div class="form-check">
                         <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Từ 500.000d-1.000.000đ
                            </label>
                        </div>
                        <div class="form-check">
                         <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">
                                Trên 1.000.000đ
                            </label>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto reset">
                            <input class="btn btn-outline-dark btn-sm" type="reset" value="Lọc">
                        </div>
                </div>
        </div>
    <div class="col-9">
        <div class="nav-center" style="margin-bottom: 30px;">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="#">Phổ biến</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Nổi bật</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Sản phẩm mới</a>
                </li>
            </ul>
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
               
            <ul id="ajax" class="products">

            <?php
                if (isset($sanpham) && !empty($sanpham)) {
                    foreach ($sanpham as $key => $value) {
                        echo '<li>
                                <a href="'.web_root.'/product/detail/'.$value['MaSP'].'">
                                    <div class="products-item" >
                                        <div class="products-top">
                                            <a href="'.web_root.'/product/detail/'.$value['MaSP'].'" class="products-thumb">
                                                <img src="'.web_root.'/public/uploads/product/'.$value['Img_sp'].'" alt="">
                                            </a>
                                            
                                            <a href="'.web_root.'/product/detail/'.$value['MaSP'].'" class="buy-now">Mua ngay</a>
                                        </div>
                                        <div class="products-info">
                                            <a href="'.web_root.'/product/detail/'.$value['MaSP'].'" class="products-name">'.$value['TenSP'].'</a>
                                        </div>
                                        <div class="d-flex align-items-end product-price">
                                            <a href="#" class="new-price">Giá :</a>
                                            <a href="#" class="new-price">'.$value['GiaSP'].'</a>
                                        </div>
                                    </div>
                                </a>
                            </li>';
                    }
                }
            ?>
                
            </ul>

              <!-- <div class="next">
                        <nav aria-label="Page navigation example" style="margin: 20px 0;">
                            <ul class="pagination" style="float: right;">
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                  <span aria-hidden="true">&laquo;</span>
                                </a>
                              </li>
                              <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
                              <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                              <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                                </a>
                              </li>
                            </ul>
                          </nav>
              </div>                 -->
        </div>
    </div>
            
</div>


     <style>
                ul.products li .products-info a{
                    display: block;
                    text-decoration: none;
                    color: #333;
                }
                .nav-center ul li a:hover{
                    outline-color : #333;
                }
                ul.products li .products-top a.buy-now{
                    text-decoration: none;
                }
                .accordion-item a{
                    text-decoration: none;
                }
            </style>

         
