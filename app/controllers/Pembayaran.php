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
    $data['thnAjaran'] = $this->model('Pembayaran_model')->getThnAjaran();
    $data['tagihan'] = $this->model('Pembayaran_model')->getTagihan();
    $this->view('templates/header', $data);
    $this->view('pembayaran/index', $data);
    $this->view('templates/footer');
  }

  public function bayar() {
    if ($this->model('Pembayaran_model')->addPembayaran($_POST) > 0) {
      Flasher::setFlash('Transaksi', 'success', 'berhasil', 'dilakukan');;
      header('Location: ' . BASEURL . '/histori');
      exit;
    } else {
      Flasher::setFlash('Transaksi', 'failed', 'gagal', 'dilakukan');;
      header('Location: ' . BASEURL . '/histori');
      exit;
    }
  }
}