<?php
class Spp_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllSpp() {
    $this->db->query("SELECT * FROM tb_spp INNER JOIN tb_siswa USING(nis) WHERE jumlah_bayar IS NOT NULL");
    return $this->db->results();
  }
}