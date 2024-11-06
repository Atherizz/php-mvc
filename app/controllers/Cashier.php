<?php 

class Cashier extends Controller {

public function index() {

    $data['judul'] = 'cashier';
    $data['cashier'] = $this->model('Cashier_model')->getAllCart();
    $this->view('template/header', $data);
    $this->view('cashier/index', $data);
    $this->view('template/footer');
}

public function addToCart() {
        if (isset($_POST['submit'])) {
    if($this->model('Cashier_model')->tambahDataKasir($_POST) > 0) {
        Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        header('Location:' . BASEURL . '/cashier');
        exit;
    } else {
        Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        header('Location:' . BASEURL . '/cashier');
        exit;
    }
}
}

public function checkoutProduct() {
    if (isset($_POST['submit'])) {
        if($this->model('Cashier_model')->tambahDataLaporan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location:' . BASEURL . '/cashier');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/cashier');
            exit;
        }
    }

}


}


