<?php
class Home extends Controller {
  public function index() {
    $data['title'] = 'Home';
    $this->view('home/index', $data);
  }

  public function login() {
    if ($this->model('Home_model')->login() > 0) {
      header('Location: ' . BASEURL . '/dashboard');
      exit;
    } else {
      header('Location: ' . BASEURL . '/home');
      exit;
    }
  }

  public function logout() {
    $this->model('Home_model')->out();
    header('Location: ' . BASEURL . '/home');
    exit;
  }
}