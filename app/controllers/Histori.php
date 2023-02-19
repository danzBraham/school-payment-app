<?php
class Histori extends Controller {
  public function index($page = 1) {
    if (!isset($_SESSION['login'])) {
      header('Location: ' . BASEURL . '/home');
      exit;
    }

    $limit = 12;
    if (!isset($_SESSION['nis'])) {
      $totalRows = $this->model('Histori_model')->getTotalTransaksi();
    } else {
      $totalRows = $this->model('Histori_model')->getTotalTransaksiBySiswa();
    }
    $totalPages = ceil($totalRows['COUNT(*)']/$limit);
    $currentPage = $page ? $page : 1;
    $offset = ($currentPage - 1) * $limit;

    $data['title'] = 'Histori';
    if (!isset($_SESSION['nis'])) {
      $data['transaksi'] = $this->model('Histori_model')->getAllTransaksi($limit, $offset);
      $data['kelas'] = $this->model('Histori_model')->getAllKelas();
    } else {
      $data['transaksi'] = $this->model('Histori_model')->getTransaksiBySiswa($limit, $offset);
    }
    $data['totalPages'] = $totalPages;
    $data['currentPage'] = $currentPage;
    $this->view('templates/header', $data);
    $this->view('histori/index', $data);
    $this->view('templates/footer');
  }

  public function laporankelas() {
    if(isset($_SESSION['nis'])) {
      echo '<script>
              alert("Anda Siswa!");
              document.location.href = "' . BASEURL . '/histori";
            </script>';
    }

    $data['title'] = 'Laporan Kelas';
    $data['kelas'] = $this->model('Histori_model')->getKelas();
    $data['bulan'] = $this->model('Histori_model')->getAllBulan();
    $data['siswa'] = $this->model('Histori_model')->getALlSiswaByKelas();
    $data['laporan'] = $this->model('Histori_model')->laporanKelas();
    $data['terbayar'] = $this->model('Histori_model')->getTerbayar();
    $data['total'] = $this->model('Histori_model')->getTotalTerbayarKelas();
    $data['tagihan'] = $this->model('Histori_model')->getTotalTagihanKelas();
    $this->view('histori/laporankelas', $data);
  }

  public function laporansiswa() {
    if(isset($_SESSION['nis'])) {
      echo '<script>
              alert("Anda Siswa!");
              document.location.href = "' . BASEURL . '/histori";
            </script>';
    }

    $data['title'] = 'Laporan Siswa';
    $data['siswa'] = $this->model('Histori_model')->searchSiswaByNis();
    $data['histori'] = $this->model('Histori_model')->getSiswaHistory();
    $data['total'] = $this->model('Histori_model')->getTotalSiswa();
    $data['tagihan'] = $this->model('Histori_model')->getTagihanSiswa();
    $this->view('histori/laporansiswa', $data);
  }
}