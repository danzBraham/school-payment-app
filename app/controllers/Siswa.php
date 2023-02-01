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

  public function edit($nis) {
    $data['title'] = "Siswa";
    $data['siswa'] = $this->model('Siswa_model')->getSiswa($nis);
    $data['kelas'] = $this->model('Siswa_model')->getAllKelas();
    $this->view('templates/header', $data);
    $this->view('siswa/edit', $data);
    $this->view('templates/footer');
  }

  public function update() {
    $this->model('Siswa_model')->updateSiswa($_POST);
    header('Location: ' . BASEURL . '/siswa');
  }

  public function delete($nis) {
    $this->model('Siswa_model')->deleteSiswa($nis);
    header('Location: ' . BASEURL . '/siswa');
  }
}