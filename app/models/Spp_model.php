<?php
class Spp_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllSpp() {
    return $this->db->results("SELECT * FROM tb_spp INNER JOIN tb_siswa USING(nis) WHERE keterangan = 'Lunas' ORDER BY tgl_bayar DESC");
  }
}