<?php

class Sanpham extends Controller
{
    private $sanpham;
    private $nhacungcap;
    private $phanloai;
    private $danhmuc;
    private $hinhanh;

    public $data = [];

    public function __construct()
    {
        $this->sanpham = $this->model('sanphamModel');
        $this->nhacungcap = $this->model('nccModel');
        $this->phanloai = $this->model('phanloaiModel');
        $this->danhmuc = $this->model('danhmucModel');
        $this->hinhanh = $this->model('hinhanhModel');

        $this->xetquyen();
    }
    public function index() // GETALL
    {
        // lay methol trong model
        $this->data['sanpham'] = $this->sanpham->GETALL(); 
        // render views
        
        $this->render('admin/header');
        $this->render('admin/sanpham/list-sp', $this->data);
        $this->render('admin/footer');
    }

    public function getid($id = '') // GETID 
    {
        if (!empty($id)) {
              
            // lay methol trong model
            $this->data['sanpham'] = $this->sanpham->GETID($id); 
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
                "MaNCC" => $_POST['ncc'],
                "MaDM" => $_POST['danhmuc'],
                "MaLoai" => $_POST['loai'],
                "TenSP" => $_POST['tensp'],
                "Size" => $_POST['size'],
                "MauSac" => $_POST['color'],
                "MotaSP" => $_POST['mota'],
                "TinhTrang" => $_POST['tinhtrang'],
                "SoLuongSP" => $_POST['soluong'],
                "GiaSP" => $_POST['giasp']
            );

            $query = $this->sanpham->POST($_data);

        }
        $this->data['nhacungcap'] = $this->nhacungcap->GETALL(); 
        $this->data['phanloai'] = $this->phanloai->GETALL(); 
        $this->data['danhmuc'] = $this->danhmuc->GETALL(); 
        // render views form  
        $this->render('admin/header'); 
        $this->render('admin/sanpham/add-sp', $this->data);
        $this->render('admin/footer');
    }

    public function suatk($id = '') // Ham su dung gia tri param
    {
        if (!empty($id)) {
            
            if (isset($_POST['submit'])) {
               
                $_data = array(
                    "MaNCC" => $_POST['ncc'],
                    "MaDM" => $_POST['danhmuc'],
                    "MaLoai" => $_POST['loai'],
                    "TenSP" => $_POST['tensp'],
                    "Size" => $_POST['size'],
                    "MauSac" => $_POST['color'],
                    "MotaSP" => $_POST['mota'],
                    "TinhTrang" => $_POST['tinhtrang'],
                    "SoluongSP" => $_POST['soluong'],
                    "GiaSP" => $_POST['giasp']
                );
    
                $query = $this->sanpham->PUT($_data, $id);
                $url = web_root.'/admin/product';
                $this->redirect($url);
    
            }

        } else {
            $this->render('errors/404');
        }

        // lay data tu row can sua de hien thi 
        $this->data['sanpham'] = $this->sanpham->GETID($id); 
        $this->data['nhacungcap'] = $this->nhacungcap->GETALL(); 
        $this->data['phanloai'] = $this->phanloai->GETALL(); 
        $this->data['danhmuc'] = $this->danhmuc->GETALL(); 
        // render views form  
        $this->render('admin/header'); 
        $this->render('admin/sanpham/add-sp', $this->data);
        $this->render('admin/footer');
    }

    public function xoatk($id = '') // ko render
    {
        if (!empty($id)) {

            $_hinhanh = $this->hinhanh->GETID($id);
            foreach ($_hinhanh as $key => $value) {
                $oldpath = "public/uploads/product/".$value['Img_sp'];
                unlink($oldpath);
            } 

            // lay methol trong model
            $query_hinhanh = $this->hinhanh->DELETEALL($id);  
            $query_sp = $this->sanpham->DELETE($id);  
            // load trang
            $url = web_root.'/admin/product';
            $this->redirect($url);

        } else {
            $this->render('errors/404');
        }
    }

}

?>