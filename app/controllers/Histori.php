<?php
class Histori extends Controller {
  public function index() {
    if (!isset($_SESSION['login'])) {
      header('Location: ' . BASEURL . '/home');
      exit;
    }

    $data['title'] = 'Histori';
    $data['transaksi'] = $this->model('Histori_model')->getAllTransaksi();
    $data['kelas'] = $this->model('Histori_model')->getAllKelas();
    $data['bulan'] = $this->model('Histori_model')->getAllBulan();
    $data['tahun'] = $this->model('Histori_model')->getAllTahun();
    $this->view('templates/header', $data);
    $this->view('histori/index', $data);
    $this->view('templates/footer');
  }
}