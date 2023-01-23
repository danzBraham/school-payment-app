<?php
class Pembayaran_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllSiswa() {
    return $this->db->results("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas)");
  }

  public function searchSiswaByNis() {
    $nis = $_POST['nis'];
    return $this->db->result("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) INNER JOIN tb_angkatan USING(angkatan) WHERE nis LIKE '%$nis%'");
  }

  public function getHistorySiswa() {
    $nis = $_POST['nis'];
    return $this->db->results("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) INNER JOIN tb_angkatan USING(angkatan) INNER JOIN tb_spp USING(nis) WHERE nis LIKE '%$nis%'");
  }

  public function addPembayaran($data) {
    $nis = $data['nis'];
    $bulan = $data['bulan'];
    $jml_bayar = intval($data['jml-bayar']);
    $nominal_bayar = intval(str_replace('.', '', substr($data['nominal-bayar'], 2)));
    $saldo = intval(str_replace('.', '', substr($data['saldo'], 2)));

    if ($saldo >= $nominal_bayar) {
      $keterangan = 'Lunas';
      $saldo -= $nominal_bayar;
      $jml_bayar = $nominal_bayar;
    } else if (($total = $saldo + $jml_bayar) >= $nominal_bayar) {
        $keterangan = 'Lunas';
        $saldo = $total - $nominal_bayar;
        $jml_bayar = $nominal_bayar;
    } else {
        $keterangan = 'Belum Lunas';
    }
  

    $this->db->query("UPDATE tb_siswa SET saldo = $saldo");

    return $this->db->query("UPDATE tb_spp SET
      jumlah_bayar = $jml_bayar, tgl_bayar = NOW(), keterangan = '$keterangan' WHERE nis = $nis AND bulan = '$bulan'
    ");
  }
}