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

  public function laporankelas() {
    $data['title'] = 'Laporan Kelas';
    $data['kelas'] = $this->model('Histori_model')->getKelas();
    $data['tanggal'] = $this->model('Histori_model')->getBulanAndTahun();
    $data['laporan'] = $this->model('Histori_model')->makeLaporanKelas();
    $data['total'] = $this->model('Histori_model')->getTotalKelas();
    $data['tagihan'] = $this->model('Histori_model')->getTagihanKelas();
    $this->view('histori/laporankelas', $data);
  }

  public function laporansiswa() {
    $data['title'] = 'Laporan Siswa';
    $data['siswa'] = $this->model('Histori_model')->searchSiswaByNis();
    $data['histori'] = $this->model('Histori_model')->getSiswaHistory();
    $data['total'] = $this->model('Histori_model')->getTotalSiswa();
    $data['tagihan'] = $this->model('Histori_model')->getTagihanSiswa();
    $this->view('histori/laporansiswa', $data);
  }
}