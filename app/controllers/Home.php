<?php
class Home extends Controller {
  public function index() {
    if (isset($_SESSION['login']) && $_SESSION['level'] == 'admin') {
      header('Location: ' . BASEURL . '/dashboard');
      exit;
    } elseif (isset($_SESSION['login']) && $_SESSION['level'] == 'petugas') {
      header('Location: ' . BASEURL . '/pembayaran');
      exit;
    } elseif (isset($_SESSION['login']) && isset($_SESSION['nis'])) {
      header('Location: ' . BASEURL . '/histori');
      exit;
    }

    $data['title'] = 'Home';
    $this->view('home/index', $data);
  }

  public function login() {
    if ($this->model('Home_model')->login() > 0 && $_SESSION['level'] == 'admin') {
      header('Location: ' . BASEURL . '/dashboard');
      exit;
    } elseif ($this->model('Home_model')->login() > 0 && $_SESSION['level'] == 'petugas') {
      header('Location: ' . BASEURL . '/pembayaran');
      exit;
    } elseif ($this->model('Home_model')->login() > 0 && isset($_SESSION['nis'])) {
      header('Location: ' . BASEURL . '/histori');
      exit;
    } else {
      Flasher::setFlashLogin('Salah!');
      header('Location: ' . BASEURL . '/home');
      exit;
    }
  }

  public function logout() {
    $this->model('Home_model')->logout();
    header('Location: ' . BASEURL . '/home');
    exit;
  }
}