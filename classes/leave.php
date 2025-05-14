<?php
require_once('config/db.php');

$db = new Database();
$conn = $db->getConnection();

private $table = "application";


public function getAll(){
    $stmt=$this->conn->query("SELECT * FROM {$this->table}");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function addApplication($name,$app,$date,$reason){
    $stmt=$this->conn->prepare("INSERT INTO {$this->table} (emp_name,appl_type,leave_date,reason) VALUES (? ,? ,? ,?)");
    return $stmt->execute([$name,$app,$date,$reason]);
}

public function getById($id){
    $stmt=$this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function edit($id,$name,$app,$date,$reason){
   $stmt=$this->conn->prepare("UPDATE {$this->table} SET appl_type= ?,leave_date= ?,reason= ? WHERE id= ?");
   return $stmt->execute([$id,$name,$app,$date,$reason]);
}

?>