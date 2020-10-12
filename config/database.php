<?php
class DataBase{
    private $host;
    private $database;
    private $user;
    private $pass;
    private $charset;
    function __construct(){
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->pass = constant('PASS');
        $this->charset = constant('CHARSET');
    }
    function conn(){
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->pass, $options);
            return $pdo;
        } catch (PDOException $e) {
            print_r("Error: " . $e->getMessage());
        }
    }
    public static  function connStatic(){
        try {
            $connection = "mysql:host=" . HOST . ";dbname=" . DB . ";charset=" . CHARSET;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($connection, USER, PASS, $options);
            return $pdo;
        } catch (PDOException $e) {
            print_r("Error: " . $e->getMessage());
        }
    }
}
?>