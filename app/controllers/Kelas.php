<?php
class Kelas extends Controller {
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

    $data['title'] = 'Kelas';
    $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
    $this->view('templates/header', $data);
    $this->view('kelas/index', $data);
    $this->view('templates/footer');
  }
}