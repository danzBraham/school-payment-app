<?php
class Login extends Controller {
  public function index() {
    $data['title'] = 'Login';
    $this->view('login/index', $data);
  }

  public function proses() {
    if ($this->model('Login_model')->login() > 0) {
      header('Location: ' . BASEURL . '/dashboard');
      exit;
    } else {
      echo "<script>
              alert('Gagal Login');
            </script>";
      header('Location: ' . BASEURL . '/login');
      exit;
    }
  }
}