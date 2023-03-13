<?php
class Histori extends Controller {
  public function index($page = 1) {
    if (!isset($_SESSION['login'])) {
      header('Location: ' . BASEURL . '/home');
      exit;
    }

    $limit = 13;
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
      $data['tahun'] = $this->model('Histori_model')->getALlThnMasuk();
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
    $data['tahun'] = $this->model('Histori_model')->getThnMasuk();
    $data['bulan'] = $this->model('Histori_model')->getAllBulan();
    $data['siswa'] = $this->model('Histori_model')->getALlSiswaByKelasAndTahun();
    $data['laporan'] = $this->model('Histori_model')->laporanKelas();
    $data['terbayar'] = $this->model('Histori_model')->getTerbayarKelas();
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
    $data['bulan'] = $this->model('Histori_model')->getAllBulan();
    $data['siswa'] = $this->model('Histori_model')->getSiswaByNis();
    $data['laporan'] = $this->model('Histori_model')->laporanSiswa();
    $data['terbayar'] = $this->model('Histori_model')->getTerbayarSiswa();
    $data['total'] = $this->model('Histori_model')->getTotalTerbayarSiswa();
    $data['tagihan'] = $this->model('Histori_model')->getTotalTagihanSiswa();
    $this->view('histori/laporansiswa', $data);
  }
}