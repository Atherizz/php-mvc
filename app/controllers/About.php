<?php 

class About extends Controller {

    public function index($nama = "panjul", $umur = "69", $hobi = "ngocok") {

        $data['nama'] = $nama;
        $data['umur'] = $umur;
        $data['hobi'] = $hobi;
        $data['judul'] = 'About Me';
 
        $this->view('template/header', $data);
        $this->view('about/index', $data);
        $this->view('template/footer');

    }
    public function page() {

        $data['judul'] = 'pages';
        $this->view('template/header', $data);
        $this->view('about/page');
        $this->view('template/footer');
    }
}
?>