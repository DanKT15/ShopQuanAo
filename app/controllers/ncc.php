<?php

class Ncc extends Controller
{
    private $nhacungcap;
    public $data = [];

    public function __construct()
    {
        $this->nhacungcap = $this->model('nccModel');

        $this->xetquyen();
    }

    public function index() // GETALL
    {
        // lay methol trong model
        $this->data['nhacungcap'] = $this->nhacungcap->GETALL(); 
        // render views
        
        $this->render('admin/header');
        $this->render('admin/nhacungcap/list-ncc', $this->data);
        $this->render('admin/footer');
    }

    public function getid($id = '') // GETID 
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $this->data['nhacungcap'] = $this->nhacungcap->GETID($id); 
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
                "TenNCC" => $_POST['tenncc']
            );

            $this->nhacungcap->POST($_data);

        }
        // render views form  
        $this->render('admin/header'); 
        $this->render('admin/nhacungcap/add-ncc');
        $this->render('admin/footer');
    }

    public function suatk($id = '') // Ham su dung gia tri param
    {
        if (!empty($id)) {
            
            if (isset($_POST['submit'])) {

                $_data = array(
                    "TenNCC" => $_POST['tenncc']
                );

                $query = $this->nhacungcap->PUT($_data, $id);

                // load trang
                $url = web_root.'/admin/provider';
                $this->redirect($url);
                
            }

        } else {
            $this->render('errors/404');
        }

        // lay data tu row can sua de hien thi 
        $this->data['nhacungcap'] = $this->nhacungcap->GETID($id);
        // render views form
        $this->render('admin/header'); 
        $this->render('admin/nhacungcap/add-ncc', $this->data);
        $this->render('admin/footer');
    }

    public function xoatk($id = '') // ko render
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $query = $this->nhacungcap->DELETE($id);  
            // load trang
            $url = web_root.'/admin/provider';
            $this->redirect($url);

        } else {
            $this->render('errors/404');
        }
    }

}

?>