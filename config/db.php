<?php
class Database{
    private $host = "localhost";
    private $db = "Leavemanagsys";
    private $username = "root";
    private $pass = "";
    public $conn;

    public function getConnection(){
        $this->conn = null;
        try{
            $conn = new PDO("mysql:host={$this->host},dbname={$this->db},$this->username,$this->pass");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo "connection error" . $e->getMessage();
        }
        return $this->conn;
    }
}
?>