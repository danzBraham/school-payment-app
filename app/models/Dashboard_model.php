<?php
class Dashboard_model {
  private $db;

  public function __construct() {
    $this->db =new Database;
  }

  public function getAllTransaksi() {
    $this->db->query("SELECT username, nama, tgl_bayar, bayar FROM tb_transaksi INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) ORDER BY tgl_bayar DESC LIMIT 7");
    return $this->db->results();
  }

  public function getTotalSiswa() {
    $this->db->query("SELECT COUNT(*) FROM tb_siswa");
    return $this->db->result();
  }

  public function getTotalKelas() {
    $this->db->query("SELECT COUNT(*) FROM tb_kelas");
    return $this->db->result();
  }

  public function getTotalPetugas() {
    $this->db->query("SELECT COUNT(*) FROM tb_petugas");
    return $this->db->result();
  }
}