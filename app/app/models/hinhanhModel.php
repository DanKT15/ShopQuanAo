<?php

class hinhanhModel extends Model
{
    private $table = 'hinhanh';
    private $hinhanh;

    public function __construct()
    {
        $this->hinhanh = new Model($this->table);
    }

    public function GETID($id = '') // Lấy dữ liệu về
    {
        return $this->hinhanh->GETID('MaSP = '.$id.'');
    }

    public function GET($id = '') // Lấy dữ liệu về
    {
        return $this->hinhanh->GETID('MaHA = '.$id.'');
    }

    public function POST($data=[]) // Tạo dữ liệu mới
    {
        return $this->hinhanh->POST($data);
    }

    public function PUT($data=[], $id = '') // Cập nhật dữ liệu
    {
        return $this->hinhanh->PUT($data, 'MaHA = '.$id.'');
    }

    public function DELETE($id = '') // Xóa dữ liệu
    {
        return $this->hinhanh->DELETE('MaHA = '.$id.'');
    }

    public function DELETEALL($id = '') // Xóa dữ liệu
    {
        return $this->hinhanh->DELETE('MaSP = '.$id.'');
    }
}

?>