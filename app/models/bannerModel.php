<?php

class bannerModel extends Model
{
    private $table = 'banner';
    private $_banner;

    public function __construct()
    {
        $this->_banner = new Model($this->table);
    }

    public function GETALL() // Lấy dữ liệu về
    {
        return $this->_banner->GETALL();
    }

    public function GETID($id = '') // Lấy dữ liệu về
    {
        return $this->_banner->GETID('MaBN = '.$id.'');
    }

    public function POST($data=[]) // Tạo dữ liệu mới
    {
        return $this->_banner->POST($data);
    }

    public function DELETE($id = '') // Xóa dữ liệu
    {
        return $this->_banner->DELETE('MaBN = '.$id.'');
    }
}

?>