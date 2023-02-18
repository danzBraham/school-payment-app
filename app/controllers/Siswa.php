<?php
class Siswa extends Controller {
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
    
    $limit = 30;
    $totalRows = $this->model('Siswa_model')->getTotalSiswa();
    $totalPages = ceil($totalRows['COUNT(*)']/$limit);
    $currentPage = $page ? $page : 1;
    $offset = ($currentPage - 1) * $limit;

    $data['title'] = "Siswa";
    $data['siswa'] = $this->model('Siswa_model')->getAllSiswa($limit, $offset);
    $data['kelas'] = $this->model('Siswa_model')->getAllKelas();
    $data['totalPages'] = $totalPages;
    $data['currentPage'] = $currentPage;
    $this->view('templates/header', $data);
    $this->view('siswa/index', $data);
    $this->view('templates/footer');
  }

  public function add() {
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

    if ($this->model('Siswa_model')->addSiswa($_POST) > 0) {
      Flasher::setFlash('Data Siswa', 'success', 'berhasil', 'ditambah');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    } else {
      Flasher::setFlash('Data Siswa', 'failed', 'gagal', 'ditambah');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    }
  }

  public function edit($nis) {
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

    $data['title'] = "Siswa";
    $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);
    $data['kelas'] = $this->model('Siswa_model')->getAllKelas();
    $this->view('templates/header', $data);
    $this->view('siswa/edit', $data);
    $this->view('templates/footer');
  }

  public function update() {
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

    if ($this->model('Siswa_model')->updateSiswa($_POST) > 0) {
      Flasher::setFlash('Data Siswa', 'success', 'berhasil', 'diperbarui');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    } else {
      Flasher::setFlash('Data Siswa', 'failed', 'gagal', 'diperbarui');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    }
  }

  public function delete($nis) {
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

    if ($this->model('Siswa_model')->deleteSiswa($nis) > 0) {
      Flasher::setFlash('Data Siswa', 'success', 'berhasil', 'dihapus');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    } else {
      Flasher::setFlash('Data Siswa', 'failed', 'gagal', 'dihapus');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    }
  }
}