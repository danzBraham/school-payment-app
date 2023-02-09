<?php
class Petugas extends Controller {
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
  
    $data['title'] = "Petugas";
    $data['petugas'] = $this->model('Petugas_model')->getAllPetugas();
    $this->view('templates/header', $data);
    $this->view('petugas/index', $data);
    $this->view('templates/footer');
  }
}