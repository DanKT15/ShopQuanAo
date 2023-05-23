<?php

class Danhmuc extends Controller
{
    private $danhmuc;
    public $data = [];

    public function __construct()
    {
        $this->danhmuc = $this->model('danhmucModel');

        $this->xetquyen();
        
    }

    public function index() // GETALL
    {
        // lay methol trong model
        $this->data['danhmuc'] = $this->danhmuc->GETALL(); 
        // render views
        
        $this->render('admin/header');
        $this->render('admin/danhmuc/list-dm', $this->data);
        $this->render('admin/footer');
    }

    public function getid($id = '') // GETID 
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $this->data['danhmuc'] = $this->danhmuc->GETID($id); 
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
                "TenDM" => $_POST['tendm'],
                "MoTa" => $_POST['motadm']
            );

            $this->danhmuc->POST($_data);

        }
        // render views form  
        $this->render('admin/header'); 
        $this->render('admin/danhmuc/add-dm');
        $this->render('admin/footer');
    }

    public function suatk($id = '') // Ham su dung gia tri param
    {
        if (!empty($id)) {
            
            if (isset($_POST['submit'])) {

                $_data = array(
                    "TenDM" => $_POST['tendm'],
                    "MoTa" => $_POST['motadm']
                );    

                $query = $this->danhmuc->PUT($_data, $id);

                // load trang
                $url = web_root.'/admin/category';
                $this->redirect($url);
                
            }

        } else {
            $this->render('errors/404');
        }

        // lay data tu row can sua de hien thi 
        $this->data['danhmuc'] = $this->danhmuc->GETID($id);
        // render views form
        $this->render('admin/header'); 
        $this->render('admin/danhmuc/add-dm', $this->data);
        $this->render('admin/footer');
    }

    public function xoatk($id = '') // ko render
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $query = $this->danhmuc->DELETE($id);  
            // load trang
            $url = web_root.'/admin/category';
            $this->redirect($url);

        } else {
            $this->render('errors/404');
        }
    }

}

?>