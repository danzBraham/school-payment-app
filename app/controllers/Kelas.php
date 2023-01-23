<?php
class Kelas extends Controller {
  public function index() {
    $data['title'] = 'Kelas';
    $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
    $this->view('templates/header', $data);
    $this->view('kelas/index', $data);
    $this->view('templates/footer');
  }
}