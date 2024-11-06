<?php 

class Transaction extends Controller {

    public function index() {

        $data['judul'] = 'Transaction Report';
        $data['transaction'] = $this->model('Transaction_model')->getTransaction();

        $this->view('template/header',$data);
        $this->view('transaction/index', $data);
        $this->view('template/footer');
} 

}


?>