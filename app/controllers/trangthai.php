<?php

class Trangthai extends Controller
{
    private $trangthai;
    public $data = [];

    public function __construct()
    {
        $this->trangthai = $this->model('trangthaiModel');

        $this->xetquyen();
    }

    public function index() // GETALL
    {
        // lay methol trong model
        $this->data['trangthai'] = $this->trangthai->GETALL(); 
        // render views
        
        $this->render('admin/header');
        $this->render('admin/trangthai/list-tt', $this->data);
        $this->render('admin/footer');
    }

    public function getid($id = '') // GETID 
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $this->data['trangthai'] = $this->trangthai->GETID($id); 
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

            $_data = array(
                "TenTT"=> $_POST['namett'],
                "MoTa"=> $_POST['mota'],
            );

            $this->trangthai->POST($_data);

        }
        // render views form  
        $this->render('admin/header'); 
        $this->render('admin/trangthai/add-tt');
        $this->render('admin/footer');
    }

    public function suatk($id = '') // Ham su dung gia tri param
    {
        if (!empty($id)) {
            
            if (isset($_POST['submit'])) {

                $_data = array(
                    "TenTT"=> $_POST['namett'],
                    "MoTa"=> $_POST['mota'],
                );

                $query = $this->trangthai->PUT($_data, $id);

                // load trang
                $url = web_root.'/admin/status';
                $this->redirect($url);
                
            }

        } else {
            $this->render('errors/404');
        }

        // lay data tu row can sua de hien thi 
        $this->data['trangthai'] = $this->trangthai->GETID($id);
        // render views form
        $this->render('admin/header'); 
        $this->render('admin/trangthai/add-tt', $this->data);
        $this->render('admin/footer');
    }

    public function xoatk($id = '') // ko render
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $query = $this->trangthai->DELETE($id);  
            // load trang
            $url = web_root.'/admin/status';
            $this->redirect($url);

        } else {
            $this->render('errors/404');
        }
    }

}

?>