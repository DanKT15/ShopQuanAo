<?php

class Connection 
{
    private static $instance = null;
    private static $conn = null;
    
    private function __construct($config)
    {
        try {
            $option = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
            ];
            $db = new PDO("mysql:host=".$config['host']."; dbname=".$config['db']."", $config['user'], "", $option);
            self::$conn = $db;
            
        }
        catch (Exception $exception) {
            $mess = $exception->getMessage();
            die($mess);
        }
    }

    public static function getInstance($config)
    {
        if (self::$instance == null) {
            $connection = new Connection($config);
            self::$instance = self::$conn;
        }
        return self::$instance;
    }
}

?>