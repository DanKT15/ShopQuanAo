<?php

class Donhang extends Controller
{
    private $donhang;
    public $data = [];

    public function __construct()
    {
        $this->donhang = $this->model('donhangModel');

        $this->xetquyen();
    }

    public function index() // GETALL
    {
        // lay methol trong model
        $this->data['donhang'] = $this->donhang->GETALL(); 
        // render views
        
        $this->render('admin/header');
        $this->render('admin/donhang/list-dh', $this->data);
        $this->render('admin/footer');
    }

    public function getid($id = '') // GETID 
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $this->data['donhang'] = $this->donhang->GETID($id); 
            // render views
            $this->render('Product/ListProduct', $this->data);

        } else {
            $this->render('errors/404');
        }
    }

    public function themtk() // Ham su dung gia tri param
    { 
        // lay du lieu tu input form
        if (isset($_POST['submit'])) {

            $Taikhoan = $_POST['MaTK'];
            if ($Taikhoan) {
                $_data = array(
                    "MaTK" => $_POST['MaTK'],
                    "GhiChu" => $_POST['color'],
                    "MaTT" => $_POST['mota']
                );
            } else {
                $_data = array(
                    "TenNN" => $_POST['danhmuc'],
                    "DiaChi" => $_POST['loai'],
                    "SDT" => $_POST['tensp'],
                    "GhiChu" => $_POST['color'],
                    "MaTT" => $_POST['mota']
                );
            }
    
            $query = $this->donhang->POST($_data);

        }
    }

    public function suatk($id = '') // Ham su dung gia tri param
    { 
        if (empty($id)) {
            // lay du lieu tu input form
        if (isset($_POST['submit'])) {

            $Taikhoan = $_POST['MaTK'];
            if ($Taikhoan) {
                $_data = array(
                    "MaTK" => $_POST['MaTK'],
                    "GhiChu" => $_POST['color'],
                    "MaTT" => $_POST['mota']
                );
            } else {
                $_data = array(
                    "TenNN" => $_POST['danhmuc'],
                    "DiaChi" => $_POST['loai'],
                    "SDT" => $_POST['tensp'],
                    "GhiChu" => $_POST['color'],
                    "MaTT" => $_POST['mota']
                );
            }
        }
        } else {
            $this->render('errors/404');
        }
        
        
    }
}

?>