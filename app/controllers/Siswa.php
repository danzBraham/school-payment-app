<?php
class Siswa extends Controller {
  public function index() {
    $data['title'] = "Siswa";
    $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
    $this->view('templates/header', $data);
    $this->view('siswa/index', $data);
    $this->view('templates/footer');
  }

  public function tambah() {
    $this->model('Siswa_model')->addSiswa($_POST);
    header('Location: ' . BASEURL . '/siswa');
  }
}