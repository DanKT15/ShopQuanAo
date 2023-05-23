<?php

class ctdhModel extends Model
{
    private $table = 'chitietdonhang';
    private $_ctdh;

    public function __construct()
    {
        $this->_ctdh = new Model($this->table);
    }

    public function GETALL() // Lấy dữ liệu về
    {
        return $this->_ctdh->GETALL();
    }

    public function GETID($id = '') // Lấy dữ liệu về
    {
        return $this->_ctdh->SQL("SELECT s.TenSP, c.Size, s.MauSac, c.SoLuong, s.GiaSP
        FROM donhang d, chitietdonhang c, sanpham s
        WHERE d.MaDH = c.MaDH AND s.MaSP = c.MaSP AND d.MaDH =".$id.";");
    }

    public function POST($data=[]) // Tạo dữ liệu mới
    {
        return $this->_ctdh->POST($data);
    }
    
    public function PUT($data=[], $id = '') // Cập nhật dữ liệu
    {
        return $this->_ctdh->PUT($data, 'MaCTDH = '.$id.'');
    }

    public function DELETE($id = '') // Xóa dữ liệu
    {
        return $this->_ctdh->DELETE('MaCTDH = '.$id.'');
    }
}

?>