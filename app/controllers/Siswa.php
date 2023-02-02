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
    if ($this->model('Siswa_model')->addSiswa($_POST) > 0) {
      Flasher::setFlash('success', 'berhasil', 'ditambah');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    } else {
      Flasher::setFlash('failed', 'gagal', 'ditambah');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    }
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
    if ($this->model('Siswa_model')->updateSiswa($_POST) > 0) {
      Flasher::setFlash('success', 'berhasil', 'diperbarui');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    } else {
      Flasher::setFlash('failed', 'gagal', 'diperbarui');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    }
  }

  public function delete($nis) {
    if ($this->model('Siswa_model')->deleteSiswa($nis) > 0) {
      Flasher::setFlash('success', 'berhasil', 'dihapus');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    } else {
      Flasher::setFlash('failed', 'gagal', 'dihapus');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    }
  }
}