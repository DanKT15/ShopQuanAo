<?php

class nccModel extends Model
{
    private $table = 'nhacungcap';
    private $_ncc;

    public function __construct()
    {
        $this->_ncc = new Model($this->table);
    }

    public function GETALL() // Lấy dữ liệu về
    {
        return $this->_ncc->GETALL();
    }

    public function GETID($id = '') // Lấy dữ liệu về
    {
        return $this->_ncc->GETID('MaNCC = '.$id.'');
    }

    public function POST($data=[]) // Tạo dữ liệu mới
    {
        return $this->_ncc->POST($data);
    }

    public function PUT($data=[], $id = '') // Cập nhật dữ liệu
    {
        return $this->_ncc->PUT($data, 'MaNCC = '.$id.'');
    }

    public function DELETE($id = '') // Xóa dữ liệu
    {
        return $this->_ncc->DELETE('MaNCC = '.$id.'');
    }
}

?>