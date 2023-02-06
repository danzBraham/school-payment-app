<?php
class Spp extends Controller {
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

    $data['title'] = 'SPP';
    $data['spp'] = $this->model('Spp_model')->getAllSPP();
    $this->view('templates/header', $data);
    $this->view('spp/index', $data);
    $this->view('templates/footer');
  }
}