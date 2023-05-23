<?php

class Account extends Controller
{
    private $sanpham;
    private $taikhoan;
    private $phanloai;
    public $data = [];

    public function __construct()
    {
        $this->sanpham = $this->model('sanphamModel');
        $this->taikhoan = $this->model('taikhoanModel');
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

    public function logout()
    {
        $this->set_logout();
        $url = web_root.'/account/login';
        $this->redirect($url);
    }

    public function login() // GETALL
    {
        if (isset($_POST['dangnhap'])) {

            $email = $_POST['email'];
            $pass = md5($_POST['pass']);    

            if (!empty($email) && !empty($pass)) {
                $ktra = $this->taikhoan->login($email);
                if (!empty($ktra)) {
                    foreach ($ktra as $key => $value) {
                        $_id = $value['MaTK'];
                        $_quyen = $value['Quyen'];
                        $_pass = $value['Pass'];
                    }
                    if ($pass == $_pass) {
                        $this->set_logged($_id, $_quyen);
                        $test = $this->is_admin();
                        if ($test) {
                            $url = web_root.'/admin';
                            $this->redirect($url);
                        }
                        else {
                            $url = web_root;
                            $this->redirect($url);
                        }
                    }
                }
            }else {
                $url = web_root.'/account/login';
                $this->redirect($url);
            }
        }

        // render views
        $this->render('user/inc/header', $this->data);
        $this->render('user/shopping', $this->data);
        $this->render('user/login', $this->data);
        $this->render('user/inc/footer');
    }

    public function register() // GETALL
    {
        if (isset($_POST['dangki'])) {

            $email = $_POST['Email'];
            $ktra = $this->taikhoan->GETALL();
            $test = true;
            foreach ($ktra as $key => $value) {
                if ($email == $value['Email']) {
                    $test = false;
                }
            }
            if ($test) {
                $_data = array(
                    "HoTen" => $_POST['hoten'],
                    "DiaChi" => $_POST['address'],
                    "SDT" => $_POST['phone'],
                    "Email" => $_POST['Email'],
                    "Pass" => md5($_POST['pass']),
                    "Quyen" => 0
                );
    
                $this->taikhoan->POST($_data);
                $url = web_root.'/account/login';
                $this->redirect($url);
            }
            else {
                $url = web_root.'/account/register';
                $this->redirect($url);
            }
        }


        // render views
        $this->render('user/inc/header', $this->data);
        $this->render('user/shopping', $this->data);
        $this->render('user/register', $this->data);
        $this->render('user/inc/footer');
    }

}
?>