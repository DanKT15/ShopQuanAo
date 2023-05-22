<?php

class Cart extends Controller
{
    private $sanpham;
    private $taikhoan;
    private $donhang;
    private $phanloai;
    private $ctdh;
    public $data = [];

    public function __construct()
    {
        $this->sanpham = $this->model('sanphamModel');
        $this->taikhoan = $this->model('taikhoanModel');
        $this->donhang = $this->model('donhangModel');
        $this->ctdh = $this->model('ctdhModel');
        $this->phanloai = $this->model('phanloaiModel');

        $this->data['phanloai'] = $this->phanloai->GETALL();

        // kiểm tra giỏ hàng trống hay ko
        if (empty($_SESSION['giohang'])) {
            $url = web_root.'/Home';
            $this->redirect($url);
        }
        
        if (isset($_POST['idsp'])) {
            $idgh = $_POST['idsp'];
            unset($_SESSION['giohang'][$idgh]);
            $url = web_root.'/Home';
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
        if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
            $list = "";
            foreach($_SESSION['giohang'] as $idsp => $value) { 
				$list .= $idsp.","; 
			} 
			$list = substr($list, 0, -1);
            $this->data['donhang'] = $this->sanpham->Detail_giohang($list);
            
            // xu li don hang
            if (isset($_POST['thanhtoan'])) {

                $Taikhoan = $_POST['idtk'];
                if ($Taikhoan) {
                    $_data = array(
                        "MaTK" => $Taikhoan,
                        "MaTT" => 7
                    );
                    $query1 = $this->donhang->POST($_data);
                    $hoadon = $this->donhang->IDDH_tk($Taikhoan);
                    foreach ($hoadon as $key => $value) {
                        $idhd = $value['MaDH'];
                    }

                    foreach($_SESSION['giohang'] as $key => $value) { 
                        $_data_gh = array(
                            "MaSP" => $key,
                            "MaDH" => $idhd,
                            "SoLuong" => $value['soluong'],
                            "Size" => $value['size']
                        );
                        $query2 = $this->ctdh->POST($_data_gh);
                    }

                } else {
                    $_data = array(
                        "TenNN" => $_POST['name'],
                        "DiaChi" => $_POST['adress'],
                        "SDT" => $_POST['txtTelephone'],
                        "MaTT" => 7
                    );
                    $query1 = $this->donhang->POST($_data);
                    $hoadon = $this->donhang->IDDH_sdt($_POST['txtTelephone']);
                    foreach ($hoadon as $key => $value) {
                        $idhd = $value['MaDH'];
                    }

                    foreach($_SESSION['giohang'] as $key => $value) { 
                        $_data_gh = array(
                            "MaSP" => $key,
                            "MaDH" => $idhd,
                            "SoLuong" => $value['soluong'],
                            "Size" => $value['size']
                        );
                        $query2 = $this->ctdh->POST($_data_gh);
                    }

                }
        
                unset($_SESSION['giohang']);
                $url = web_root;
                $this->redirect($url);

            }
            
        }
        
        
        $xacnhan = $this->kiemtra();
        if ($xacnhan != 0) {
            $this->data['taikhoan'] = $this->taikhoan->GETID($xacnhan);
        }
        

        if (isset($_POST['capnhat'])) {
            if (isset($_POST['quantity']) && !empty($_POST['quantity'])) {  
                if ($_POST['quantity'] == 0) {
                    
                    unset($_SESSION['giohang'][$_POST['idgh']]);
                    $url = web_root.'/Home';
                    $this->redirect($url);
                }
                else {
                    
                    $_SESSION['giohang'][$_POST['idgh']]['soluong'] = $_POST['quantity'];
                    $url = web_root.'/cart';
                    $this->redirect($url);
                }
                
            }
        }

        // render views
        $this->render('user/inc/header', $this->data);
        $this->render('user/shopping', $this->data);
        $this->render('user/pay', $this->data);
        $this->render('user/inc/footer');
    }

    public function delete($id = '')
    {
        unset($_SESSION['giohang'][$id]);
        $url = web_root.'/cart';
        $this->redirect($url);
    }

    public function kiemtra()
    {
        $user = $this->is_logged();
        if (empty($user)) {
            $xacnhan = 0;
        }
        else {
            $xacnhan = $this->get_current_id();
        }
        return $xacnhan;
    }

}
?>