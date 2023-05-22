<?php

class gioithieuModel extends Model
{
    private $table = 'gioithieu';
    private $_gioithieu;

    public function __construct()
    {
        $this->_gioithieu = new Model($this->table);
    }

    public function GETALL() // Lấy dữ liệu về
    {
        return $this->_gioithieu->GETALL();
    }

    public function GETID($id = '') // Lấy dữ liệu về
    {
        return $this->_gioithieu->GETID('MaGT = '.$id.'');
    }

    public function POST($data=[]) // Tạo dữ liệu mới
    {
        return $this->_gioithieu->POST($data);
    }

    public function DELETE($id = '') // Xóa dữ liệu
    {
        return $this->_gioithieu->DELETE('MaGT = '.$id.'');
    }
}

?>