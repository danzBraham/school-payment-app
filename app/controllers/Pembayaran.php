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
    $data['siswa'] = $this->model('Pembayaran_model')->getAllSiswa();
    $data['siswaByNis'] = $this->model('Pembayaran_model')->searchSiswaByNis();
    $data['siswaHistory'] = $this->model('Pembayaran_model')->getSiswaHistory();
    $data['tagihan'] = $this->model('Pembayaran_model')->getTagihan();
    $this->view('templates/header', $data);
    $this->view('pembayaran/index', $data);
    $this->view('templates/footer');
  }

  public function bayar() {
    $this->model('Pembayaran_model')->addPembayaran($_POST);
    header('Location: ' . BASEURL . '/histori');
  }
}