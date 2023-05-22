<?php

class Phanloai extends Controller
{
    private $phanloai;
    public $data = [];

    public function __construct()
    {
        $this->phanloai = $this->model('phanloaiModel');

        $this->xetquyen();
    }

    public function index() // GETALL
    {
        // lay methol trong model
        $this->data['phanloai'] = $this->phanloai->GETALL(); 
        // render views
        
        $this->render('admin/header');
        $this->render('admin/phanloai/list-pl', $this->data);
        $this->render('admin/footer');
    }

    public function getid($id = '') // GETID 
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $this->data['phanloai'] = $this->phanloai->GETID($id); 
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
                "TenLoai" => $_POST['tenloai']
            );

            $this->phanloai->POST($_data);

        }
        // render views form  
        $this->render('admin/header'); 
        $this->render('admin/phanloai/add-pl');
        $this->render('admin/footer');
    }

    public function suatk($id = '') // Ham su dung gia tri param
    {
        if (!empty($id)) {
            
            if (isset($_POST['submit'])) {

                $_data = array(
                    "TenLoai" => $_POST['tenloai']
                );

                $query = $this->phanloai->PUT($_data, $id);

                // load trang
                $url = web_root.'/admin/variety';
                $this->redirect($url);
                
            }

        } else {
            $this->render('errors/404');
        }

        // lay data tu row can sua de hien thi 
        $this->data['phanloai'] = $this->phanloai->GETID($id);
        // render views form
        $this->render('admin/header'); 
        $this->render('admin/phanloai/add-pl', $this->data);
        $this->render('admin/footer');
    }

    public function xoatk($id = '') // ko render
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $query = $this->phanloai->DELETE($id);  
            // load trang
            $url = web_root.'/admin/variety';
            $this->redirect($url);

        } else {
            $this->render('errors/404');
        }
    }

}

?>