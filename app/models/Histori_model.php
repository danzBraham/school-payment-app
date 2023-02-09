<?php
class Histori_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllTransaksi() {
    $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) ORDER BY tgl_bayar DESC LIMIT 13");
    return $this->db->results();
  }

  public function getAllKelas() {
    $this->db->query("SELECT * FROM tb_kelas");
    return $this->db->results();
  }

  public function getAllBulan() {
    $this->db->query("SELECT * FROM tb_spp GROUP BY bulan ORDER BY id_spp");
    return $this->db->results();
  }

  public function getAllTahun() {
    $this->db->query("SELECT * FROM tb_spp GROUP BY tahun");
    return $this->db->results();
  }

  public function getKelas() {
    $kelas = $_POST['kelas'];
    $this->db->query("SELECT * FROM tb_kelas WHERE id_kelas = :kelas");
    $this->db->bind('kelas', $kelas);
    return $this->db->result();
  }

  public function getBulanAndTahun() {
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

    $this->db->query("SELECT * FROM tb_spp WHERE bulan = :bulan AND tahun = :tahun GROUP BY tahun AND bulan");
    $this->db->bind('bulan', $bulan);
    $this->db->bind('tahun', $tahun);
    return $this->db->result();
  }

  public function makeLaporanKelas() {
    $kelas = $_POST['kelas'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

    $this->db->query("SELECT * FROM tb_spp INNER JOIN tb_siswa USING(nis) WHERE id_kelas = :kelas AND bulan = :bulan AND tahun = :tahun ORDER BY nama ASC");
    $this->db->bind('kelas', $kelas);
    $this->db->bind('bulan', $bulan);
    $this->db->bind('tahun', $tahun);
    return $this->db->results();
  }
}