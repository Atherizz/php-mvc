<?php 

Class Cashier_model {
    private $table = "detail_transaksi";
    private $db;

    public function __construct() {
       $this->db = new Database();
    }
    
    public function getAllCart() {
        $this->db->query('SELECT * FROM ' . $this->table) ;
        return $this->db->resultSet();
    }

    public function tambahDataKasir($data) {

        $barang = $data['produk'];
        $qty = $data['qty'];
        
        $queryIdBarang = "SELECT id FROM barang WHERE produk = :produk";
        $this->db->query($queryIdBarang);
        $this->db->bind('produk', $barang);
        $ambilIdBarang = $this->db->single();
                
        if ($ambilIdBarang) {
            $idBarang = $ambilIdBarang['id'];
            } else {
            return false;
            }

        $queryHarga = "SELECT harga FROM barang WHERE produk = :produk";
        $this->db->query($queryHarga);
        $this->db->bind('produk', $barang);
        $harga = $this->db->single();
        $harga = $harga['harga'];

        $query = "INSERT INTO detail_transaksi (id_barang, qty, harga, barang) VALUES 
            (:id_barang, :qty, :harga,:barang)
            ";

        $this->db->query($query);
        $this->db->bind('id_barang', $idBarang);
        $this->db->bind('qty', $qty);
        $this->db->bind('harga', $harga);
        $this->db->bind('barang', $barang);
        $this->db->execute();
        return $this->db->rowCount();

    }


}