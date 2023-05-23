<?php

class sanphamModel extends Model
{
    private $table = 'sanpham';
    private $_sanpham;

    public function __construct()
    {
        $this->_sanpham = new Model($this->table);
    }

    public function gioitinh($idgt = '') // Lấy dữ liệu về
    {
        return $this->_sanpham->SQL("SELECT DISTINCT s.MaSP, s.TenSP, s.GiaSP, h.Img_sp
        FROM sanpham s, phanloai p, hinhanh h
        WHERE s.MaLoai = p.MaLoai
        AND s.MaSP = h.MaSP
        AND p.TenLoai LIKE '%$idgt%'
        GROUP BY s.MaSP;");
    }

    public function danhmuc($iddm = '', $idgt = '') // Lấy dữ liệu về
    {
        return $this->_sanpham->SQL("SELECT DISTINCT s.MaSP, s.TenSP, s.GiaSP, h.Img_sp
        FROM sanpham s, danhmuc d, phanloai p, hinhanh h
        WHERE s.MaDM = d.MaDM
        AND s.MaLoai = p.MaLoai
        AND s.MaSP = h.MaSP
        AND d.MaDM = $iddm 
        AND	p.TenLoai LIKE '%$idgt%'
        GROUP BY s.MaSP;");
    }


    public function GETALL() // Lấy dữ liệu về
    {
        return $this->_sanpham->SQL("SELECT MaSP,n.TenNCC,d.TenDM,p.TenLoai,TenSP,Size,MauSac,MotaSP,TinhTrang,SoLuongSP,GiaSP
        FROM sanpham sp, phanloai p, nhacungcap n, danhmuc d
        WHERE sp.MaNCC = n.MaNCC AND sp.MaDM = d.MaDM AND sp.MaLoai = p.MaLoai;");
    }

    public function Detail($id = '') // Lấy dữ liệu về
    {
        return $this->_sanpham->SQL("SELECT MaSP,n.TenNCC,d.TenDM,p.TenLoai,TenSP,Size,MauSac,MotaSP,TinhTrang,SoLuongSP,GiaSP
        FROM sanpham sp, phanloai p, nhacungcap n, danhmuc d
        WHERE MaSP = ".$id." AND sp.MaNCC = n.MaNCC AND sp.MaDM = d.MaDM AND sp.MaLoai = p.MaLoai;");
    }

    public function Search($search) // Lấy dữ liệu về
    {
        return $this->_sanpham->SQL("SELECT DISTINCT s.MaSP, s.TenSP, s.GiaSP, h.Img_sp
        FROM sanpham s, phanloai p, hinhanh h
        WHERE s.MaLoai = p.MaLoai
        AND s.MaSP = h.MaSP
        AND s.tenSP LIKE  '%".$search."%'
        GROUP BY s.MaSP;");
    }

    public function Full_text_search($search = 'Áo khoác')
    {
        return $this->_sanpham->SQL("SELECT DISTINCT s.MaSP, s.TenSP, s.GiaSP, h.Img_sp, MATCH (s.TenSP) AGAINST ('$search') as score 
        FROM sanpham s, hinhanh h
        WHERE s.MaSP = h.MaSP
        AND MATCH (s.TenSP) AGAINST ('$search') > 0 
        GROUP BY s.MaSP
        ORDER BY score DESC;");
    }

    public function Detail_giohang($id = '') // Lấy dữ liệu về
    {
        return $this->_sanpham->SQL("SELECT DISTINCT s.MaSP, s.TenSP, s.MauSac, s.GiaSP, s.SoLuongSP, h.Img_sp
        FROM sanpham s, hinhanh h
        WHERE s.MaSP IN (".$id.")
        AND s.MaSP = h.MaSP
        GROUP BY s.MaSP;");
    }

    public function Detail_Img($id = '') // Lấy dữ liệu về
    {
        return $this->_sanpham->SQL("SELECT h.Img_sp
        FROM sanpham s, hinhanh h
        WHERE s.MaSP = ".$id."
        AND s.MaSP = h.MaSP;");
    }

    public function GETNEW() // Lấy dữ liệu về
    {
        return $this->_sanpham->SQL("SELECT s.MaSP, s.TenSP, s.GiaSP, h.Img_sp
        FROM sanpham s, hinhanh h
        WHERE s.MaSP = h.MaSP
        GROUP BY s.TenSP
        ORDER BY s.MaSP DESC LIMIT 5;");
    }

    public function GETID($id = '') // Lấy dữ liệu về
    {
        return $this->_sanpham->SQL("SELECT MaSP,n.MaNCC,d.MaDM,p.MaLoai,n.TenNCC,d.TenDM,p.TenLoai,TenSP,Size,MauSac,MotaSP,TinhTrang,SoLuongSP,GiaSP
        FROM sanpham sp, phanloai p, nhacungcap n, danhmuc d
        WHERE MaSP = ".$id." AND sp.MaNCC = n.MaNCC AND sp.MaDM = d.MaDM AND sp.MaLoai = p.MaLoai;");
    }

    public function POST($data=[]) // Tạo dữ liệu mới
    {
        return $this->_sanpham->POST($data);
    }

    public function PUT($data=[], $id = '') // Cập nhật dữ liệu
    {
        return $this->_sanpham->PUT($data, 'MaSP = '.$id.'');
    }

    public function DELETE($id = '') // Xóa dữ liệu
    {
        return $this->_sanpham->DELETE('MaSP = '.$id.'');
    }
}

?>