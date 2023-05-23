<?php

class taikhoanModel extends Model
{
    private $table = 'taikhoan';
    private $_taikhoan;

    public function __construct()
    {
        $this->_taikhoan = new Model($this->table);
    }

    public function GETALL() // Lấy dữ liệu về
    {
        return $this->_taikhoan->GETALL();
    }

    public function GETID($id = '') // Lấy dữ liệu về
    {
        return $this->_taikhoan->GETID('MaTK = '.$id.'');
    }

    public function login($email = '') // Lấy dữ liệu về
    {
        return $this->_taikhoan->SQL("SELECT *
        FROM taikhoan t
        WHERE t.Email = '{$email}';");
    }

    public function POST($data=[]) // Tạo dữ liệu mới
    {
        return $this->_taikhoan->POST($data);
    }

    public function PUT($data=[], $id = '') // Cập nhật dữ liệu
    {
        return $this->_taikhoan->PUT($data, 'MaTK = '.$id.'');
    }

    public function DELETE($id = '') // Xóa dữ liệu
    {
        return $this->_taikhoan->DELETE('MaTK = '.$id.'');
    }

}

?>
