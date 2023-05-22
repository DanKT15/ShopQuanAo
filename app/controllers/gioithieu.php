<?php

class Gioithieu extends Controller
{
    private $gioithieu;
    public $data = [];

    public function __construct()
    {
        $this->gioithieu = $this->model('gioithieuModel');

        $this->xetquyen();
    }

    public function index() // GETALL
    {
        // lay methol trong model
        $this->data['gioithieu'] = $this->gioithieu->GETALL(); 
        // render views
        
        $this->render('admin/header');
        $this->render('admin/gioithieu/list-gt', $this->data);
        $this->render('admin/footer');
    }

    public function getid($id = '') // GETID 
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $this->data['gioithieu'] = $this->gioithieu->GETID($id); 

        } else {
            $this->render('errors/404');
        }
    }

    public function themtk() // Ham su dung gia tri param
    { 
        // lay du lieu tu input form
        if (isset($_POST['submit'])) {
             
            $image = $_FILES['ImageUpload']['name'];
            $tmp_image = $_FILES['ImageUpload']['tmp_name'];
            $div = explode('.',$image);
            $file_ext  = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;
            $path_uploads = "public/uploads/gioithieu/".$unique_image;

            $_data = array(
                "Img_gt" => $unique_image
            );

            $this->gioithieu->POST($_data);
            move_uploaded_file($tmp_image, $path_uploads);
    
        } 
        
        // render views form  
        $this->render('admin/header'); 
        $this->render('admin/gioithieu/add-gt');
        $this->render('admin/footer');
    }

    public function xoatk($id = '') // ko render
    {
        if (!empty($id)) {
            
            $bn_hinhanh = $this->gioithieu->GETID($id); 
            foreach ($bn_hinhanh as $key => $value) {
                $oldpath = "public/uploads/gioithieu/".$value['Img_gt'];
                unlink($oldpath);
            }
            // lay methol trong model
            $query = $this->gioithieu->DELETE($id);  
            // load trang
            $url = web_root.'/admin/introduce';
            $this->redirect($url);

        } 
        else {
            $this->render('errors/404');
        }
    }

}

?>