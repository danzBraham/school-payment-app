<?php
class Spp extends Controller {
  public function index() {
    $data['title'] = 'SPP';
    $data['spp'] = $this->model('Spp_model')->getAllSPP();
    $this->view('templates/header', $data);
    $this->view('spp/index', $data);
    $this->view('templates/footer');
  }
}