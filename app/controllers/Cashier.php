<?php 

class Cashier extends Controller {

public function index() {

    $data['judul'] = 'cashier';
    $data['cashier'] = $this->model('Cashier_model')->getAllCart();
    $data['discount'] = $this->model('Cashier_model')->getAllDiscount();
    $data['report'] = $this->model('Transaction_model')->getTransaction();
    $this->view('template/header', $data);
    $this->view('cashier/index', $data);
    $this->view('template/footer');
}

public function addToCart() {

    $result = $this->model('Cashier_model')->tambahDataKasir($_POST);

    if ($result !== true) {
        // Jika ada error, kirim error ke halaman index
        $data['error'] = $result;

        $data['cashier'] = $this->model('Cashier_model')->getAllCart() ?? [];
        $data['discount'] = $this->model('Cashier_model')->getAllDiscount() ?? [];

        $this->view('template/header', $data);
        $this->view('cashier/index', $data);
        $this->view('template/footer');
    } else {
        // Jika sukses, redirect ke halaman cashier tanpa error
        header('Location: ' . BASEURL . '/cashier');
        exit;
    }
}

public function checkoutProduct() {
    if (isset($_POST['submit'])) {
        $result = $this->model('Cashier_model')->tambahDataLaporan($_POST);

        if ($result !== true) {
            $data['error'] = $result;

        $data['cashier'] = $this->model('Cashier_model')->getAllCart() ?? [];
        $data['discount'] = $this->model('Cashier_model')->getAllDiscount() ?? [];

        $this->view('template/header', $data);
        $this->view('cashier/index', $data);
        $this->view('template/footer');

        } else {
            header('Location: ' . BASEURL . '/cashier');
            exit;
        }
    }

}


}


