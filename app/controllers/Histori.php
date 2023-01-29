<?php
class Histori extends Controller {
  public function index() {
    $data['title'] = 'Histori';
    $data['histori'] = $this->model('Histori_model')->getAllHistori();
    $this->view('templates/header', $data);
    $this->view('histori/index', $data);
    $this->view('templates/footer');
  }
}