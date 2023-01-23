<?php
class Laporan extends Controller {
  public function index() {
    $data['title'] = 'Laporan';
    $this->view('templates/header', $data);
    $this->view('laporan/index');
    $this->view('templates/footer');
  }
}