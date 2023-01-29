<?php
class Histori_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllHistori() {
    return $this->db->results("SELECT * FROM tb_transaksi ORDER BY tgl_bayar DESC");
  }
}