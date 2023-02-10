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

    if ($this->model('Petugas_model')->addPetugas($_POST) > 0) {
      Flasher::setFlash('Data Petugas', 'success', 'berhasil', 'ditambah');
      header('Location: ' . BASEURL . '/petugas');
      exit;
    } else {
      Flasher::setFlash('Data Petugas', 'failed', 'gagal', 'ditambah');
      header('Location: ' . BASEURL . '/petugas');
      exit;
    }
  }

  public function edit($id) {
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
    $data['petugas'] = $this->model('Petugas_model')->getPetugasById($id);
    $this->view('templates/header', $data);
    $this->view('petugas/edit', $data);
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

    if ($this->model('Petugas_model')->updatePetugas($_POST) > 0) {
      Flasher::setFlash('Data Petugas', 'success', 'berhasil', 'diperbarui');
      header('Location: ' . BASEURL . '/petugas');
      exit;
    } else {
      Flasher::setFlash('Data Petugas', 'failed', 'gagal', 'diperbarui');
      header('Location: ' . BASEURL . '/petugas');
      exit;
    }
  }

  public function delete($id) {
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

    if ($this->model('Petugas_model')->deletePetugas($id) > 0) {
      Flasher::setFlash('Data Petugas', 'success', 'berhasil', 'dihapus');
      header('Location: ' . BASEURL . '/petugas');
      exit;
    } else {
      Flasher::setFlash('Data Petugas', 'failed', 'gagal', 'dihapus');
      header('Location: ' . BASEURL . '/petugas');
      exit;
    }
  }
}