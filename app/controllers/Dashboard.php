<?php
class Dashboard extends Controller {
  public function index() {
    if (!isset($_SESSION['login'])) {
      header('Location: ' . BASEURL . '/home');
      exit;
    }

    if ($_SESSION['level'] == 'petugas') {
      echo '<script>
              alert("Anda Petugas!");
              document.location.href = "' . BASEURL . '/pembayaran";
            </script>';
    } elseif (isset($_SESSION['nis'])) {
      echo '<script>
              alert("Anda Siswa!");
              document.location.href = "' . BASEURL . '/histori";
            </script>';
    }

    $data['title'] = 'Dashboard';
    $data['transaksi'] = $this->model('Dashboard_model')->getAllTransaksi();
    $data['siswa'] = $this->model('Dashboard_model')->getTotalSiswa();
    $data['kelas'] = $this->model('Dashboard_model')->getTotalKelas();
    $data['petugas'] = $this->model('Dashboard_model')->getTotalPetugas();
    $this->view('templates/header', $data);
    $this->view('dashboard/index', $data);
    $this->view('templates/footer');
  }
}