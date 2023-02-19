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

    if ($this->model('Kelas_model')->addKelas($_POST) > 0) {
      Flasher::setFlash('Data Kelas', 'success', 'berhasil', 'ditambah');
      header('Location: ' . BASEURL . '/kelas');
      exit;
    } else {
      Flasher::setFlash('Data Kelas', 'failed', 'gagal', 'ditambah');
      header('Location: ' . BASEURL . '/kelas');
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

    $data['title'] = "Kelas";
    $data['kelasById'] = $this->model('Kelas_model')->getKelasById($id);
    $data['jurusan'] = $this->model('Kelas_model')->getJurusan();
    $this->view('templates/header', $data);
    $this->view('kelas/edit', $data);
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

    if ($this->model('Kelas_model')->updateKelas($_POST) > 0) {
      Flasher::setFlash('Data Kelas', 'success', 'berhasil', 'diperbarui');
      header('Location: ' . BASEURL . '/kelas');
      exit;
    } else {
      Flasher::setFlash('Data Kelas', 'failed', 'gagal', 'diperbarui');
      header('Location: ' . BASEURL . '/kelas');
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

    if ($this->model('Kelas_model')->deleteKelas($id) > 0) {
      Flasher::setFlash('Data Kelas', 'success', 'berhasil', 'dihapus');
      header('Location: ' . BASEURL . '/kelas');
      exit;
    } else {
      Flasher::setFlash('Data Kelas', 'failed', 'gagal', 'dihapus');
      header('Location: ' . BASEURL . '/kelas');
      exit;
    }
  }
}