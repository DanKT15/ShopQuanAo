<?php

class Ctdh extends Controller
{
    private $ctdh;
    private $donhang;
    private $trangthai;
    public $data = [];

    public function __construct()
    {
        $this->ctdh = $this->model('ctdhModel');
        $this->donhang = $this->model('donhangModel');
        $this->trangthai = $this->model('trangthaiModel');

        $this->xetquyen();
    }

    public function index() // GETALL
    {
        // lay methol trong model
        $this->data['ctdh'] = $this->ctdh->GETALL(); 
        // render views
        $this->render('Product/ListProduct', $this->data);
    }

    public function getid($id = '') // GETID 
    {
        if (!empty($id)) {
            
            // lay methol trong model
            $this->data['sanpham'] = $this->ctdh->GETID($id); 
            $this->data['tthai'] = $this->trangthai->GETALL(); 
            
            $arr = $this->donhang->GETID($id);
            foreach ($arr as $key => $value) {
                $kiemtra = ($value['MaTK']);
            } 
            if (is_null($kiemtra) == 1) {
                $this->data['thongtin'] = $this->donhang->GETDH($id);
            }else {
                $this->data['thongtin'] = $this->donhang->GETTK($id);
            }
            
            if (isset($_POST['submit'])) {
                $_data = array(
                    "MaTT" => $_POST['trangthai']
                );
                
                $query = $this->donhang->PUT($_data, $id);

                // load trang
                $url = web_root.'/admin/details/get/'.$id;
                $this->redirect($url);
            }
            // render views
            $this->render('admin/header');
            $this->render('admin/donhang/list-ctsp', $this->data);
            $this->render('admin/footer');

        } else {
            $this->render('errors/404');
        }
    }
    // {
    //     if (!empty($id)) {
            
    //         if (isset($_POST['submit'])) {
    //             $_data = array(
    //                 "HoTen"=> $_POST['a'],
    //             );
    //             $query = $this->ctdh->PUT($_data, $id);
    //             if ($query) {
    //                 // load trang
    //                 // $this->redirect($url);
    //             }
    //         }

    //     } else {
    //         $this->render('errors/404');
    //     }
    //     // lay data tu row can sua de hien thi 
    //     $this->data['tk'] = $this->ctdh->GETID($id);
    //     // render views form
    //     $this->render('Product/ListProduct', $this->data);
    // }

    // public function xoatk($id = '') // ko render
    // {
    //     if (!empty($id)) {
              
    //         // lay methol trong model
    //         $query = $this->ctdh->DELETE($id); 
    //         // load trang
    //         // $this->redirect($url);           

    //     } else {
    //         $this->render('errors/404');
    //     }
    // }

}

?>