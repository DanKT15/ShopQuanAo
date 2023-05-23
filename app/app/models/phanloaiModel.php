<?php

class phanloaiModel extends Model
{
    private $table = 'phanloai';
    private $_phanloai;

    public function __construct()
    {
        $this->_phanloai = new Model($this->table);
    }

    public function GETALL() // Lấy dữ liệu về
    {
        return $this->_phanloai->GETALL();
    }

    public function GETID($id = '') // Lấy dữ liệu về
    {
        return $this->_phanloai->GETID('MaLoai = '.$id.'');
    }

    public function POST($data=[]) // Tạo dữ liệu mới
    {
        return $this->_phanloai->POST($data);
    }

    public function PUT($data=[], $id = '') // Cập nhật dữ liệu
    {
        return $this->_phanloai->PUT($data, 'MaLoai = '.$id.'');
    }

    public function DELETE($id = '') // Xóa dữ liệu
    {
        return $this->_phanloai->DELETE('MaLoai = '.$id.'');
    }
}

?>