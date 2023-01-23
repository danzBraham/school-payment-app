<?php
class Siswa_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllSiswa() {
    return $this->db->results("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas)");
  }

  public function getAllKelas() {
    return $this->db->results("SELECT * FROM tb_kelas");
  }

  public function addSiswa($data) {
    $nis = intval($data['nis']);
    $nama = $data['nama'];
    $password = $data['password'];
    $kelas = $data['kelas'];
    $telp = $data['telp'];
    $alamat = $data['alamat'];

    $this->db->query("INSERT INTO tb_siswa VALUES (
      $nis, '$kelas', '$nama', '$password', '$alamat', '$telp', 0
    )");

    return $this->db->query("INSERT INTO tb_spp VALUES 
      ('', 'Januari', $nis, null, null, null),
      ('', 'Februari', $nis, null, null, null),
      ('', 'Maret', $nis, null, null, null),
      ('', 'April', $nis, null, null, null),
      ('', 'Mei', $nis, null, null, null),
      ('', 'Juni', $nis, null, null, null),
      ('', 'Juli', $nis, null, null, null),
      ('', 'Agustus', $nis, null, null, null),
      ('', 'September', $nis, null, null, null),
      ('', 'Oktober', $nis, null, null, null),
      ('', 'November', $nis, null, null, null),
      ('', 'Desember', $nis, null, null, null)");
  }
}