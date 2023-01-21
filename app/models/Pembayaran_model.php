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

  public function addPembayaran($data) {
    $nis = $data['nis'];
    $jml_bayar = intval($data['jml-bayar']);
    $tgl_bayar = $data['tgl-bayar'];
    $nama_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $bulan_sekarang = date('n');
    $nama_bulan = $nama_bulan[$bulan_sekarang - 1];
    $nominal_bayar = intval(str_replace('.', '', substr($data['nominal-bayar'], 2)));
    $keterangan = $jml_bayar >= $nominal_bayar ? 'Lunas' : 'Belum Lunas';

    return $this->db->query("INSERT INTO tb_spp VALUES (
      '', $nis, $jml_bayar, '$tgl_bayar', '$nama_bulan', '$keterangan'
    )");
  }
}