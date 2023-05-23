<?php

class Product extends Controller
{
    private $sanpham;
    private $danhmuc;
    private $phanloai;
    public $data = [];

    public function __construct()
    {
        $this->sanpham = $this->model('sanphamModel');
        $this->danhmuc = $this->model('danhmucModel');
        $this->phanloai = $this->model('phanloaiModel');

        $this->data['phanloai'] = $this->phanloai->GETALL();
    }

    public function detail($id) // GETALL
    {
        $this->data['sanpham'] = $this->sanpham->Detail($id);
        $this->data['sp_img'] = $this->sanpham->Detail_Img($id);
        $sp = $this->sanpham->Detail($id);

        foreach ($sp as $key => $value) {
            $Max = $value['SoLuongSP'];
        }

        // thêm sản phẩm vào giỏ hàng
        if (isset($_POST['giohang'])) {
            
            if (!isset($_SESSION['giohang'][$id])) {
                $_SESSION['giohang'][$id] = array(
                    "soluong" => $_POST['quantity'],
                    "size" => $_POST['size']
                );
            }else {
                $tonghop = $_POST['quantity'] + $_SESSION['giohang'][$id]['soluong'];
                $req = ($tonghop <= $Max) ? $tonghop : $Max ;
                $_SESSION['giohang'][$id]['soluong'] = $req;
            }
            
            $url = web_root.'/product/detail/'.$id;
            $this->redirect($url);
        }

        if (isset($_POST['idsp'])) {
            $idgh = $_POST['idsp'];
            unset($_SESSION['giohang'][$idgh]);
            $url = web_root.'/product/detail/'.$id;
            $this->redirect($url);
        }

        // hiển thị sản phẩm trong giỏ hàng
        if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
            $list = "";
            foreach($_SESSION['giohang'] as $idsp => $value) { 
				$list .= $idsp.","; 
			} 
			$list = substr($list, 0, -1);
            $this->data['giohang'] = $this->sanpham->Detail_giohang($list);
        }

        // render views
        $this->render('user/inc/header', $this->data);
        $this->render('user/shopping', $this->data);
        $this->render('user/product_details', $this->data);
        $this->render('user/inc/footer');
    }

    public function gender($gioitinh = '') // GETALL
    {
        $this->data['sanpham'] = $this->sanpham->gioitinh($gioitinh);
        $this->data['gioitinh'] = $gioitinh;

        $this->data['danhmuc'] = $this->danhmuc->GETALL(); 

        if (isset($_POST['idsp'])) {
            $idgh = $_POST['idsp'];
            unset($_SESSION['giohang'][$idgh]);
            $url = web_root.'/product/gender/'.$gioitinh;
            $this->redirect($url);
        }

        // hiển thị sản phẩm trong giỏ hàng
        if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
            $list = "";
            foreach($_SESSION['giohang'] as $idsp => $value) { 
				$list .= $idsp.","; 
			} 
			$list = substr($list, 0, -1);
            $this->data['giohang'] = $this->sanpham->Detail_giohang($list);
        }
        // render views
        $this->render('user/inc/header', $this->data);
        $this->render('user/shopping', $this->data);
        $this->render('user/products', $this->data);
        $this->render('user/inc/footer');
    }

    //ham xu ly tim kiem
    //goi qua model product de lay du lieu
    public function search()
    {
        if ($_POST['search'] == '') {
            header("Location:" . web_root . "");
        }
        $search = $_POST['search'];
        $this->data['search'] = $this->sanpham->Search($search);

        $this->render('user/inc/header', $this->data);
        $this->render('user/shopping', $this->data);
        $this->render('user/search', $this->data);
        $this->render('user/inc/footer');
    }

    public function ajaxtest()
    {   
        $iddm = $_GET['iddm'];
        $idgt = $_GET['idgt'];
        $ajax = $this->sanpham->danhmuc((int)$iddm , $idgt);

        echo json_encode($ajax);
    }
}
?>