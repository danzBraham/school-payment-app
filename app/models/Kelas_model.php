<?php
class Kelas_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllKelas() {
    return $this->db->results("SELECT * FROM tb_kelas");
  }
}