<?php

class Hinhanh extends Controller
{
    private $hinhanh;
    public $data = [];

    public function __construct()
    {
        $this->hinhanh = $this->model('hinhanhModel');

        $this->xetquyen();
    }

    public function getid($id = '') // GETID 
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $this->data['hinhanh'] = $this->hinhanh->GETID($id); 
            $this->data['idsp'] = $id;
            // render views form  
            $this->render('admin/header'); 
            $this->render('admin/hinhanh/list-ha', $this->data);
            $this->render('admin/footer');

        } else {
            $this->render('errors/404');
        }
    }

    public function themtk($id = '') // Ham su dung gia tri param
    { 
        // lay du lieu tu input form
        if (isset($_POST['submit'])) {

            if (!empty($id)) {
              
                $image = $_FILES['ImageUpload']['name'];
                $tmp_image = $_FILES['ImageUpload']['tmp_name'];
                $div = explode('.',$image);
                $file_ext  = strtolower(end($div));
                $unique_image = $div[0].time().'.'.$file_ext;
                $path_uploads = "public/uploads/product/".$unique_image;

                $_data = array(
                    "MaSP" => $id,
                    "Img_sp" => $unique_image
                );

                $query = $this->hinhanh->POST($_data);
                move_uploaded_file($tmp_image, $path_uploads);
    
            } else {
                $this->render('errors/404');
            }
        }
        $this->data['idsp'] = $id;
        // render views form  
        $this->render('admin/header'); 
        $this->render('admin/hinhanh/add-ha', $this->data);
        $this->render('admin/footer');
    }

    public function xoatk($id = '') // ko render
    {
        $_hinhanh = $this->hinhanh->GET($id); 
        foreach ($_hinhanh as $key => $value) {
            $idsp = $value['MaSP'];
            $oldpath = "public/uploads/product/".$value['Img_sp'];
            unlink($oldpath);
        }

        if (!empty($id)) {

            // lay methol trong model
            $query = $this->hinhanh->DELETE($id);  
            // load trang
            $url = web_root.'/admin/image/get/'.$idsp;
            $this->redirect($url);

        } else {
            $this->render('errors/404');
        }
    }
}

?>