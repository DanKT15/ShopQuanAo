<?php

class Banner extends Controller
{
    private $banner;
    public $data = [];

    public function __construct()
    {
        $this->banner = $this->model('bannerModel');

        $this->xetquyen();
    }

    public function index() // GETALL
    {
        // lay methol trong model
        $this->data['banner'] = $this->banner->GETALL(); 
        // render views
        
        $this->render('admin/header');
        $this->render('admin/banner/list-bn', $this->data);
        $this->render('admin/footer');
    }

    public function getid($id = '') // GETID 
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $this->data['banner'] = $this->banner->GETID($id); 

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
            $path_uploads = "public/uploads/banner/".$unique_image;

            $_data = array(
                "HinhAnh_banner" => $unique_image
            );

            $this->banner->POST($_data);
            move_uploaded_file($tmp_image, $path_uploads);
    
        } 
        
        // render views form  
        $this->render('admin/header'); 
        $this->render('admin/banner/add-bn');
        $this->render('admin/footer');
    }

    public function xoatk($id = '') // ko render
    {
        if (!empty($id)) {
            
            $bn_hinhanh = $this->banner->GETID($id); 
            foreach ($bn_hinhanh as $key => $value) {
                $oldpath = "public/uploads/banner/".$value['HinhAnh_banner'];
                unlink($oldpath);
            }
            // lay methol trong model
            $query = $this->banner->DELETE($id);  
            // load trang
            $url = web_root.'/admin/banner';
            $this->redirect($url);

        } 
        else {
            $this->render('errors/404');
        }
    }

}

?>