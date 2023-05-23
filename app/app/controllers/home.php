<?php

class Home extends Controller
{
    private $sanpham;
    private $banner;
    private $gioithieu;
    private $phanloai;
    public $data = [];

    public function __construct()
    {
        $this->sanpham = $this->model('sanphamModel');
        $this->banner = $this->model('bannerModel');
        $this->gioithieu = $this->model('gioithieuModel');
        $this->phanloai = $this->model('phanloaiModel');

        $this->data['phanloai'] = $this->phanloai->GETALL();

        if (isset($_POST['idsp'])) {
            $idgh = $_POST['idsp'];
            unset($_SESSION['giohang'][$idgh]);
            $url = web_root;
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
    }

    public function index() // GETALL
    {
        $this->data['sanpham'] = $this->sanpham->GETNEW();
        $this->data['banner'] = $this->banner->GETALL();
        // render views
        $this->render('user/inc/header', $this->data);
        $this->render('user/shopping', $this->data);
        $this->render('user/inc/main', $this->data);
        $this->render('user/inc/footer');
    }

    public function introduce() // GETALL
    {
        $this->data['gioithieu'] = $this->gioithieu->GETALL();

        // render views
        $this->render('user/inc/header', $this->data);
        $this->render('user/shopping', $this->data);
        $this->render('user/introduce', $this->data);
        $this->render('user/inc/footer');
    }

}
?>