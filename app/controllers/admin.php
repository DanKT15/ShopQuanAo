<?php

class Admin extends Controller
{
    public $data = [];

    public function __construct() // kiểm tra quyền quản trị
    {
        $this->xetquyen();
    }

    public function index() 
    {
        $this->order(); // mặc định khởi chạy trang sp
    }

    public function account($action = 'index', $id = '') // tài khoản
    {
        $controller = $this->controller('taikhoan');
        if (!empty($action)) {
            switch ($action) {    
                case "index" : $controller->index(); break;
                case "get": 
                    if (!empty($id)) {
                        $controller->getid($id); break;
                    } else {
                        break;
                    }
                case "post": $controller->themtk(); break;
                case "put": 
                    if (!empty($id)) {
                        $controller->suatk($id); break;
                    } else {
                        break;
                    }                    
                case "delete": 
                    if (!empty($id)) {
                        $controller->xoatk($id); break;
                    } else {
                        break;
                    }
            }        
        } else {
            $this->render('errors/404');
        }
    }

    public function product($action = 'index', $id = '') // sản phẩm
    {
        $controller = $this->controller('sanpham');
        if (!empty($action)) {
            switch ($action) {    
                case "index" : $controller->index(); break;
                case "get": 
                    if (!empty($id)) {
                        $controller->getid($id); break;
                    } else {
                        break;
                    }
                case "post": $controller->themtk(); break;
                case "put": 
                    if (!empty($id)) {
                        $controller->suatk($id); break;
                    } else {
                        break;
                    }                    
                case "delete": 
                    if (!empty($id)) {
                        $controller->xoatk($id); break;
                    } else {
                        break;
                    }
            }        
        } else {
            $this->render('errors/404');
        }
    }

    public function category($action = 'index', $id = '') // danh mục
    {
        $controller = $this->controller('danhmuc');
        if (!empty($action)) {
            switch ($action) {    
                case "index" : $controller->index(); break;
                case "get": 
                    if (!empty($id)) {
                        $controller->getid($id); break;
                    } else {
                        break;
                    }
                case "post": $controller->themtk(); break;
                case "put": 
                    if (!empty($id)) {
                        $controller->suatk($id); break;
                    } else {
                        break;
                    }                    
                case "delete": 
                    if (!empty($id)) {
                        $controller->xoatk($id); break;
                    } else {
                        break;
                    }
            }        
        } else {
            $this->render('errors/404');
        }
    }

    public function provider($action = 'index', $id = '') // nhà cung cấp
    {
        $controller = $this->controller('ncc');
        if (!empty($action)) {
            switch ($action) {    
                case "index" : $controller->index(); break;
                case "get": 
                    if (!empty($id)) {
                        $controller->getid($id); break;
                    } else {
                        break;
                    }
                case "post": $controller->themtk(); break;
                case "put": 
                    if (!empty($id)) {
                        $controller->suatk($id); break;
                    } else {
                        break;
                    }                    
                case "delete": 
                    if (!empty($id)) {
                        $controller->xoatk($id); break;
                    } else {
                        break;
                    }
            }        
        } else {
            $this->render('errors/404');
        }
    }

    public function order($action = 'index', $id = '') // đơn hàng
    {
        $controller = $this->controller('donhang');
        if (!empty($action)) {
            switch ($action) {    
                case "index" : $controller->index(); break;
            }        
        } else {
            $this->render('errors/404');
        }
    }

    public function details($action = 'get', $id = '') // chi tiết đơn hàng
    {
        $controller = $this->controller('ctdh');
        if (!empty($action)) {
            switch ($action) {    
                case "get": 
                    if (!empty($id)) {
                        $controller->getid($id); break;
                    } else {
                        break;
                    }
                case "put": 
                    if (!empty($id)) {
                        $controller->suatk($id); break;
                    } else {
                        break;
                    }                 
            }        
        } else {
            $this->render('errors/404');
        }
    }

    public function status($action = 'index', $id = '') // trạng thái
    {
        $controller = $this->controller('trangthai');
        if (!empty($action)) {

            
            switch ($action) {    
                case "index" : $controller->index(); break;
                case "get": 
                    if (!empty($id)) {
                        $controller->getid($id); break;
                    } else {
                        break;
                    }
                case "post": $controller->themtk(); break;
                case "put": 
                    if (!empty($id)) {
                        $controller->suatk($id); break;
                    } else {
                        break;
                    }                    
                case "delete": 
                    if (!empty($id)) {
                        $controller->xoatk($id); break;
                    } else {
                        break;
                    }
            }        
            

        } else {
            $this->render('errors/404');
        }
    }

    public function variety($action = 'index', $id = '') // phân loại
    {
        $controller = $this->controller('phanloai');
        if (!empty($action)) {
            switch ($action) {    
                case "index" : $controller->index(); break;
                case "get": 
                    if (!empty($id)) {
                        $controller->getid($id); break;
                    } else {
                        break;
                    }
                case "post": $controller->themtk(); break;
                case "put": 
                    if (!empty($id)) {
                        $controller->suatk($id); break;
                    } else {
                        break;
                    }                    
                case "delete": 
                    if (!empty($id)) {
                        $controller->xoatk($id); break;
                    } else {
                        break;
                    }
            }        
        } else {
            $this->render('errors/404');
        }
    }

    public function image($action = 'get', $id = '') // tài khoản
    {
        $controller = $this->controller('hinhanh');
        if (!empty($action)) {
            switch ($action) {    
                case "get": 
                    if (!empty($id)) {
                        $controller->getid($id); break;
                    } else {
                        break;
                    }
                case "post": 
                    if (!empty($id)) {
                        $controller->themtk($id); break;
                    } else {
                        break;
                    }                   
                case "delete": 
                    if (!empty($id)) {
                        $controller->xoatk($id); break;
                    } else {
                        break;
                    }
            }        
        } else {
            $this->render('errors/404');
        }
    }

    public function banner($action = 'index', $id = '') // tài khoản
    {
        $controller = $this->controller('banner');
        if (!empty($action)) {
            switch ($action) {
                case "index" : $controller->index(); break;
                case "get": 
                    if (!empty($id)) {
                        $controller->getid($id); break;
                    } else {
                        break;
                    }
                case "post": $controller->themtk(); break;               
                case "delete": 
                    if (!empty($id)) {
                        $controller->xoatk($id); break;
                    } else {
                        break;
                    }
            }        
        } else {
            $this->render('errors/404');
        }
    }

    public function introduce($action = 'index', $id = '') // tài khoản
    {
        $controller = $this->controller('gioithieu');
        if (!empty($action)) {
            switch ($action) {
                case "index" : $controller->index(); break;
                case "get": 
                    if (!empty($id)) {
                        $controller->getid($id); break;
                    } else {
                        break;
                    }
                case "post": $controller->themtk(); break;               
                case "delete": 
                    if (!empty($id)) {
                        $controller->xoatk($id); break;
                    } else {
                        break;
                    }
            }        
        } else {
            $this->render('errors/404');
        }
    }
}

?>