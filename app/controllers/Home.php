<?php
class Home extends Controller {
  public function index($nis = null) {
    $data['title'] = 'Home';
    $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
    $data['siswaByNis'] = $this->model('Siswa_model')->searchSiswaByNis($nis);
    $this->view('templates/header', $data);
    $this->view('home/index', $data);
    $this->view('templates/footer');
  }
}