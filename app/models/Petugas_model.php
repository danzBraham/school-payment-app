<?php
class Petugas_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllPetugas() {
    $this->db->query("SELECT * FROM tb_petugas");
    return $this->db->results();
  }
}