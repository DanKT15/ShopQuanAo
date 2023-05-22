<?php 

class Model extends Database
{
    protected $db;
    private $_table; 

    public function __construct($_table)
    {
        parent::__construct();
        $this->_table = $_table;
    }

    public function POST($data=[]) // Tạo dữ liệu mới
    {
        $query = $this->insert($this->_table, $data);
        return $query;
    }

    public function GETALL() // Lấy dữ liệu về
    {
        $query = $this->select($this->_table);
        return $query;
    }

    public function GETID($condition = '') // Lấy dữ liệu về
    {
        $query = $this->select($this->_table, $condition);
        return $query;
    }

    public function PUT($data=[], $condition = '') // Cập nhật dữ liệu
    {
        $query = $this->update($this->_table, $data, $condition);
        return $query;
    }

    public function DELETE($condition = '') // Xóa dữ liệu
    {
        $query = $this->drop($this->_table, $condition);
        return $query;
    }

    public function SQL($sql = '') 
    {
        $query = $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $query;
    }

// =====================================================================================================================































}

?>