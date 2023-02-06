<?php
class Histori extends Controller {
  public function index() {
    if (!isset($_SESSION['login'])) {
      header('Location: ' . BASEURL . '/home');
      exit;
    }

    $data['title'] = 'Histori';
    $data['histori'] = $this->model('Histori_model')->getAllHistori();
    $this->view('templates/header', $data);
    $this->view('histori/index', $data);
    $this->view('templates/footer');
  }
}