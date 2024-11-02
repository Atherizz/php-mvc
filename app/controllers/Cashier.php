<?php 

class Cashier extends Controller {

public function index() {

    $data['judul'] = 'cashier';
    $this->view('template/header', $data);
    $this->view('cashier/index', $data);
    $this->view('template/footer');
}

}


