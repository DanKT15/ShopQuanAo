<?php

class Taikhoan extends Controller
{
    private $taikhoan;
    public $data = [];

    public function __construct()
    {
        $this->taikhoan = $this->model('taikhoanModel');

        $this->xetquyen();
    }

    public function index() // GETALL
    {
        // lay methol trong model
        $this->data['taikhoan'] = $this->taikhoan->GETALL(); 
        // render views
        
        $this->render('admin/header');
        $this->render('admin/taikhoan/list-tk', $this->data);
        $this->render('admin/footer');
    }

    public function getid($id = '') // GETID 
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $this->data['taikhoan'] = $this->taikhoan->GETID($id); 

        } else {
            $this->render('errors/404');
        }
    }

    public function themtk() // Ham su dung gia tri param
    { 
        // lay du lieu tu input form
        if (isset($_POST['submit'])) {

            $_data = array(
                "HoTen" => $_POST['hoten'],
                "DiaChi" => $_POST['diachi'],
                "SDT" => $_POST['sdt'],
                "Email" => $_POST['email'],
                "Pass" => md5($_POST['pass']),
                "Quyen" => $_POST['quyen']
            );

            $this->taikhoan->POST($_data);

        }
        // render views form  
        $this->render('admin/header'); 
        $this->render('admin/taikhoan/add-tk');
        $this->render('admin/footer');
    }

    public function suatk($id = '') // Ham su dung gia tri param
    {
        if (!empty($id)) {
            
            if (isset($_POST['submit'])) {

                $_data = array(
                    "HoTen" => $_POST['hoten'],
                    "DiaChi" => $_POST['diachi'],
                    "SDT" => $_POST['sdt'],
                    "Email" => $_POST['email'],
                    "Pass" => md5($_POST['pass']),
                    "Quyen" => $_POST['quyen']
                );

                $query = $this->taikhoan->PUT($_data, $id);

                // load trang
                $url = web_root.'/admin/account';
                $this->redirect($url);
                
            }

        } else {
            $this->render('errors/404');
        }

        // lay data tu row can sua de hien thi 
        $this->data['taikhoan'] = $this->taikhoan->GETID($id);
        // render views form
        $this->render('admin/header'); 
        $this->render('admin/taikhoan/add-tk', $this->data);
        $this->render('admin/footer');
    }

    public function xoatk($id = '') // ko render
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $query = $this->taikhoan->DELETE($id);  
            // load trang
            $url = web_root.'/admin/account';
            $this->redirect($url);

        } else {
            $this->render('errors/404');
        }
    }

}

?>

<?php
    
?>;