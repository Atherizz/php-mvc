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

    public function getAllDiscount() {
        $this->db->query(('SELECT * FROM diskon'));
        return $this->db->resultSet();
    }

    // public function getDiscountInfo($data) {
    //     $cekDiskon = (int)
    //     $query = "SELECT * FROM diskon WHERE ";
    // }

    public function tambahDataLaporan($data) {

        $error = "";

        $idCustomer = (int)$data['customerID'];
        $idDiskon =(int)$data["discountID"];

        $queryCheckCustomer = "SELECT * FROM customer WHERE id = :id";
        $this->db->query($queryCheckCustomer);
        $this->db->bind('id', $idCustomer);
        $this->db->single();

        // MENAMBAHKAN CUSTOMER ID
        if ($this->db->rowCount() == 0) {
            $queryInsertCustomer = "INSERT INTO customer (id) VALUES (:id)";
            $this->db->query($queryInsertCustomer);
            $this->db->bind('id', $idCustomer);
            $this->db->execute();
        } 

        $subtotal = 0;

        $queryHarga = "SELECT * FROM detail_transaksi";
        $this->db->query($queryHarga);
        $ambilHarga = $this->db->resultSet();

        foreach ($ambilHarga as $row) {
            $subtotal += $row['subtotal'];
        }

        $date = date('Y-m-d H:i:s');

        // MEMERIKSA DISKON
        $queryDiskon = "SELECT * FROM diskon WHERE id = :id ";
        $this->db->query($queryDiskon);
        $this->db->bind('id', $idDiskon);
        $resultDiscount = $this->db->single();

        if ($this->db->rowCount() == 1) {
            if ($resultDiscount['masa_berlaku'] > $date) {
                $subtotal -= ($subtotal * ($resultDiscount['persentase'] / 100));
            } else {
                return "diskon sudah tidak berlaku!";
            }
        } else {
            return "diskon tidak ditemukan!";
        }

        // MENAMBAHKAN LAPORAN TRANSAKSI TIAP PEMBAYARAN
        $queryTransaksi = "INSERT INTO transaksi (customer_id, `date`, total) VALUES
        (:customer_id, :date, :total)
        ";

        $this->db->query($queryTransaksi);
        $this->db->bind('customer_id', $idCustomer);
        $this->db->bind('date', $date);
        $this->db->bind('total', $subtotal);
        $this->db->execute();

        // MENAMBAHKAN LAPORAN TRANSAKSI TIAP PRODUK
        $queryLaporan = "INSERT INTO riwayat_transaksi (id_transaksi, id_barang, barang, qty, harga, subtotal, date) SELECT id, id_barang, barang, qty, harga, subtotal, :date
        FROM detail_transaksi;   
        ";

        $this->db->query($queryLaporan);
        $this->db->bind('date', $date);
        $this->db->execute();

        $queryDelete = "DELETE FROM detail_transaksi";
        $this->db->query($queryDelete);

        if ($this->db->execute()) {
            return true;
        }
        

     
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
            return "barang tidak ditemukan";
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
        
        if ($this->db->execute()) {
            return true;
        } 

    }


}