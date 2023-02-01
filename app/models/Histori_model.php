<?php
class Histori_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllHistori() {
    return $this->db->results("SELECT * FROM tb_transaksi INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) ORDER BY tgl_bayar DESC");
  }
}