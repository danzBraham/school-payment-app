<?php
class Spp extends Controller {
  public function index($page = 1) {
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

    $limit = 12;
    $totalRows = $this->model('Spp_model')->getTotalSpp();
    $totalPages = ceil($totalRows['COUNT(*)']/$limit);
    $currentPage = $page ? $page : 1;
    $offset = ($currentPage - 1) * $limit;

    $data['title'] = 'SPP';
    $data['spp'] = $this->model('Spp_model')->getAllSpp($limit, $offset);
    $data['totalPages'] = $totalPages;
    $data['currentPage'] = $currentPage;
    $this->view('templates/header', $data);
    $this->view('spp/index', $data);
    $this->view('templates/footer');
  }
}