<?php
class Siswa extends Controller {
  public function index() {
    $data['title'] = "Siswa";
    $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
    $data['kelas'] = $this->model('Siswa_model')->getAllKelas();
    $this->view('templates/header', $data);
    $this->view('siswa/index', $data);
    $this->view('templates/footer');
  }

  public function tambah() {
    $this->model('Siswa_model')->addSiswa($_POST);
    header('Location: ' . BASEURL . '/siswa');
  }

  public function ubah() {
    $id = json_decode(file_get_contents("php://input"), true);
    echo json_encode($this->model('Siswa_model')->getSiswa($id['id']));
  }
}