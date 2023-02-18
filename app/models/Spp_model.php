<?php
class Spp_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getTotalSpp() {
    $this->db->query("SELECT COUNT(*) FROM tb_spp WHERE jumlah_bayar IS NOT NULL");
    return $this->db->result();
  }

  public function getAllSpp($limit, $offset) {
    $this->db->query("SELECT * FROM tb_spp INNER JOIN tb_siswa USING(nis) INNER JOIN tb_transaksi USING(nis) WHERE jumlah_bayar IS NOT NULL ORDER BY tgl_bayar DESC LIMIT :limit OFFSET :offset");
    $this->db->bind('limit', $limit);
    $this->db->bind('offset', $offset);
    return $this->db->results();
  }
}