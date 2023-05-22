<?php

class donhangModel extends Model
{
    private $table = 'donhang';
    private $_donhang;

    public function __construct()
    {
        $this->_donhang = new Model($this->table);
    }

    public function GETALL() // Lấy dữ liệu về
    {
        return $this->_donhang->SQL("SELECT d.MaDH, d.NgayMua, t.TenTT
        FROM donhang d, trangthai t
        WHERE d.MaTT = t.MaTT;");
    }

    public function GETTK($id = '') // Lấy dữ liệu về
    {
        return $this->_donhang->SQL("SELECT d.MaDH, tk.HoTen, tk.DiaChi, tk.SDT, d.GhiChu, t.TenTT
        FROM donhang d, taikhoan tk, trangthai t
        WHERE d.MaTK = tk.MaTK AND d.MaTT = t.MaTT AND d.MaDH = ".$id.";");
    }

    public function GETDH($id = '') // Lấy dữ liệu về
    {
        return $this->_donhang->SQL("SELECT d.MaDH, d.TenNN, d.DiaChi, d.SDT, d.GhiChu, t.TenTT
        FROM donhang d, trangthai t
        WHERE d.MaTT = t.MaTT AND d.MaDH = ".$id.";");
    }
    
    public function IDDH_sdt($sdt = '') // Lấy id đơn mới thêm
    {
        return $this->_donhang->SQL("SELECT d.MaDH
        FROM donhang d
        WHERE d.NgayMua IN (
        SELECT MAX(d.NgayMua)
        FROM donhang d
        WHERE d.SDT = ".$sdt.");");
    }

    public function IDDH_tk($id = '') // Lấy id đơn mới thêm
    {
        return $this->_donhang->SQL("SELECT d.MaDH
        FROM donhang d
        WHERE d.NgayMua IN (
            SELECT MAX(d.NgayMua)
            FROM donhang d, taikhoan t
            WHERE t.MaTK = d.MaTK
            AND t.MaTK = $id);");
    }

    public function GETID($id = '') // Lấy dữ liệu về
    {
        return $this->_donhang->GETID('MaDH = '.$id.'');
    }

    public function POST($data=[]) // Tạo dữ liệu mới
    {
        return $this->_donhang->POST($data);
    }

    public function PUT($data=[], $id = '') // Tạo dữ liệu mới
    {
        return $this->_donhang->PUT($data, 'MaDH = '.$id.'');
    }

    public function DELETE($id = '') // Xóa dữ liệu
    {
        return $this->_donhang->DELETE('MaDH = '.$id.'');
    }
}

?>