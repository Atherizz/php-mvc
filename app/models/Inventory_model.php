<?php 

class Inventory_model {
    private $table = 'barang';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAllProduct() {

     $this->db->query('SELECT * FROM ' . $this->table .' LIMIT 0, 10') ;
     return $this->db->resultSet();
     
    }

    public function getProductById($id) {

    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
    }

    public function deleteProductById($id) {
        $this->db->query('DELETE FROM barang WHERE id=:id');
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahDataProduk($data) {

        $query = "INSERT INTO barang (produk, kategori, harga, stock) VALUES 
        (:produk, :kategori, :harga, :stock)
        ";

        $this->db->query($query);
        $this->db->bind('produk', $data['produk']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stock', $data['stock']);

        $this->db->execute();
        return $this->db->rowCount();

    }

    public function searchProduk() {
        if (!isset($_POST['keyword'])) {
            return []; // Return an empty array if no keyword is provided
        }

        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM barang 
        WHERE produk LIKE :keyword";

        $this->db->query($query);

        $this->db->bind('keyword' , "%$keyword%");
        return $this->db->resultSet();
    }

    public function editDataProduk($data) {

        $query = "UPDATE barang SET 
        produk = :produk,
        kategori = :kategori,
        harga = :harga,
        stock = :stock
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('produk', $data['produk']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stock', $data['stock']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();

    }

}



?>