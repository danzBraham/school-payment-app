<?php
class Pembayaran extends Controller {
  public function index() {
    $data['title'] = 'Pembayaran';
    $data['siswa'] = $this->model('Pembayaran_model')->getAllSiswa();
    $this->view('templates/header', $data);
    $this->view('pembayaran/index', $data);
    $this->view('templates/footer');
  }

  public function siswa() {
    $data['title'] = 'Pembayaran';
    $data['siswaByNis'] = $this->model('Pembayaran_model')->searchSiswaByNis();
    $this->view('templates/header', $data);
    $this->view('pembayaran/index', $data);
    $this->view('templates/footer');
  }
}