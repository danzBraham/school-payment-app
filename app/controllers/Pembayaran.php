<?php
class Pembayaran extends Controller {
  public function index() {
    if (!isset($_SESSION['login'])) {
      header('Location: ' . BASEURL . '/home');
      exit;
    }

    if (isset($_SESSION['nis'])) {
      echo '<script>
              alert("Anda Siswa!");
              document.location.href = "' . BASEURL . '/histori";
            </script>';
    }

    $data['title'] = 'Pembayaran';
    $data['siswa'] = $this->model('Pembayaran_model')->getAllSiswa();
    $this->view('templates/header', $data);
    $this->view('pembayaran/index', $data);
    $this->view('templates/footer');
  }

  public function siswa() {
    if (!isset($_SESSION['login'])) {
      header('Location: ' . BASEURL . '/home');
      exit;
    }

    if (isset($_SESSION['nis'])) {
      echo '<script>
              alert("Anda Siswa!");
              document.location.href = "' . BASEURL . '/histori";
            </script>';
    }

    $data['title'] = 'Pembayaran';
    $data['siswa'] = $this->model('Pembayaran_model')->getAllSiswa();
    $data['siswaByNis'] = $this->model('Pembayaran_model')->searchSiswaByNis();
    $data['siswaHistory'] = $this->model('Pembayaran_model')->getSiswaHistory();
    $data['tagihan'] = $this->model('Pembayaran_model')->getTagihan();
    $this->view('templates/header', $data);
    $this->view('pembayaran/index', $data);
    $this->view('templates/footer');
  }

  public function bayar() {
    if (!isset($_SESSION['login'])) {
      header('Location: ' . BASEURL . '/home');
      exit;
    }

    if (isset($_SESSION['nis'])) {
      echo '<script>
              alert("Anda Siswa!");
              document.location.href = "' . BASEURL . '/histori";
            </script>';
    }

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