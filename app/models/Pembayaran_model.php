<?php
class Pembayaran_model {
  private $table = 'tb_siswa';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllSiswa() {
    return $this->db->results("SELECT * FROM $this->table INNER JOIN tb_kelas USING(id_kelas)");
  }

  public function searchSiswaByNis() {
    $nis = $_POST['nis'];
    return $this->db->result("SELECT * FROM $this->table INNER JOIN tb_kelas USING(id_kelas) WHERE nis LIKE '%$nis%'");
  }
}