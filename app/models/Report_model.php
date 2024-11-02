<?php 

class Report_model {
    private $table = 'riwayat_transaksi';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllReport () {
        $this->db->query("SELECT * FROM riwayat_transaksi");
        return $this->db->resultSet();
    }


}