<?php 

class Inventory extends Controller {

    public function index() {
        
        $data['judul'] = 'Inventory';
        $data['inventory'] = $this->model('Inventory_model')->getAllProduct();
        $this->view('template/header', $data);
        $this->view('inventory/index', $data);
        $this->view('template/footer');
    }

    public function search() {
        $data['judul'] = 'Inventory';
        $data['inventory'] = $this->model('Inventory_model')->searchProduk();
        $this->view('template/header', $data);
        $this->view('inventory/index', $data);
        $this->view('template/footer');
    }

    public function detail($id) {
        
        $data['judul'] = 'Detail Inventory';
        $data['inventory'] = $this->model('Inventory_model')->getProductById($id);
        $this->view('template/header', $data);
        $this->view('inventory/detail', $data);
        $this->view('template/footer');
    }

    public function delete($id) {
        if($this->model('Inventory_model')->deleteProductById($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location:' . BASEURL . '/inventory');
            exit;
        }  else {
        Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        header('Location:' . BASEURL . '/inventory');
        exit;
        }
    }

    public function getedit() {
        
       echo json_encode($this->model('Inventory_model')->getProductById($_POST['id']));
    }

    public function edit() {
        if($this->model('Inventory_model')->editDataProduk($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diedit', 'success');
            header('Location:' . BASEURL . '/inventory');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diedit', 'danger');
            header('Location:' . BASEURL . '/inventory');
            exit;
        }

    }



    public function tambah() {
        
        if($this->model('Inventory_model')->tambahDataProduk($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location:' . BASEURL . '/inventory');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/inventory');
            exit;
        }
    }
}



?>