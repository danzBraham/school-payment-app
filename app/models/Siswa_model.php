<?php
class Siswa_model {
  private $table = 'tb_siswa';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllSiswa() {
    return $this->db->results("SELECT * FROM $this->table");
  }

  public function searchSiswaByNis($nis) {
    return $this->db->result("SELECT * FROM $this->table WHERE nis LIKE '%$nis%'");
  }
}