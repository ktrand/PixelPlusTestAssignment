<?php

namespace App\Database;

class DB{

    // укажите свои учетные данные базы данных 
    private $host = "localhost";
    private $db_name = "pixel_plus";
    private $username = "root";
    private $password = '';
    private static $connection = null;

    // получаем соединение с БД 
    public function getConnection(){
        if (self::$connection) {
            return self::$connection; 
        }
        try {
            // self::$connection = new \PDO("mysql:host=localhost" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);

            self::$connection = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            self::$connection->exec("set names utf8");
        } catch(PDOException $exception){
            self::$connection = null;
        }
        return self::$connection;
    }
}
?>