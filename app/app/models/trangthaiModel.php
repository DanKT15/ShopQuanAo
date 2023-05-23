<?php

class trangthaiModel extends Model
{
    private $table = 'trangthai';
    private $_trangthai;

    public function __construct()
    {
        $this->_trangthai = new Model($this->table);
    }

    public function GETALL() // Lấy dữ liệu về
    {
        return $this->_trangthai->GETALL();
    }

    public function GETID($id = '') // Lấy dữ liệu về
    {
        return $this->_trangthai->GETID('MaTT = '.$id.'');
    }

    public function POST($data=[]) // Tạo dữ liệu mới
    {
        return $this->_trangthai->POST($data);
    }

    public function PUT($data=[], $id = '') // Cập nhật dữ liệu
    {
        return $this->_trangthai->PUT($data, 'MaTT = '.$id.'');
    }

    public function DELETE($id = '') // Xóa dữ liệu
    {
        return $this->_trangthai->DELETE('MaTT	= '.$id.'');
    }
}

?>