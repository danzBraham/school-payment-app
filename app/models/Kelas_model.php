<?php
class Kelas_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllKelas() {
    $this->db->query("SELECT * FROM tb_kelas");
    return $this->db->results();
  }
}