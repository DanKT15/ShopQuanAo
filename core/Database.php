<?php

class Database 
{
    private $_conn;

    public function __construct()
    {
        global $db_config;
        $this->_conn = Connection::getInstance($db_config);
    }

    public function query($sql)
    {
        $query = $this->_conn->prepare($sql);
        $query->execute();
        return $query;
    }

    public function select($table, $condition = '')
    {
        if (!empty($condition)) {
            $sql = "SELECT * FROM $table WHERE $condition";
        }
        else {
            $sql = "SELECT * FROM $table";
        }

        $status = $this->query($sql)->fetchAll(PDO::FETCH_ASSOC); // test ;

        if ($status) {
            return $status;
        }
        return false;
    }

    public function insert($table, $data)
    {
        if (!empty($data)) {

            $filedStr = '';
            $valueStr = '';
            foreach ($data as $key => $value) 
            {
                $filedStr .= $key.',';
                $valueStr .= "'".$value."',";
            }
            $filedStr = rtrim($filedStr, ',');
            $valueStr = rtrim($valueStr, ',');

            $sql = "INSERT INTO $table($filedStr) VALUES ($valueStr)";

            $status = $this->query($sql)->fetchAll(PDO::FETCH_ASSOC); // test 

            if ($status) {
                return true;
            }

        }

        return false;
    }

    public function update($table, $data, $condition = '')
    {
        if (!empty($data)) {

            $updateStr = '';
            foreach ($data as $key => $value) {
                $updateStr .= "$key = '$value',";
            }

            $updateStr = rtrim($updateStr, ',');

            if (!empty($condition)) {
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            }
            else {
                $sql = "UPDATE $table SET $updateStr";
            }

            $status = $this->query($sql)->fetchAll(PDO::FETCH_ASSOC); // test ;

            if ($status) {
                return true;
            }

        }
        return false;
    }

    public function drop($table, $condition = '')
    {
        if (!empty($condition)) {
            $sql = "DELETE FROM $table WHERE $condition";
        }
        else {
            $sql = "DELETE FROM $table";
        }

        $status = $this->query($sql)->fetchAll(PDO::FETCH_ASSOC); // test ;

        if ($status) {
            return true;
        }
        return false;
    }
}

?>



