<?php 

class Report extends Controller {

    public function index() {

        $data['judul'] = 'Sales Report';
        $data['report'] = $this->model('Report_model')->getAllReport();

        $this->view('template/header',$data);
        $this->view('report/index', $data);
        $this->view('template/footer');
    }
}