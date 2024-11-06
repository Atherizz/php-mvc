<?php 

class Transaction_model {
private $db;

public function __construct() {
    $this->db = new Database();
}

public function getTransaction() {
    $query = "SELECT * FROM transaksi";

    $this->db->query($query);
    return $this->db->resultSet();
}
}


?>