<?php
class Home extends Controller {
  public function index() {
    $data['title'] = 'Home';
    $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
    $this->view('templates/header', $data);
    $this->view('home/index', $data);
    $this->view('templates/footer');
  }

  public function siswa() {
    $data['title'] = 'Home';
    $data['siswa'] = $this->model('Siswa_model')->searchSiswaByNis();
    $this->view('templates/header', $data);
    $this->view('home/index', $data);
    $this->view('templates/footer');
  }
}