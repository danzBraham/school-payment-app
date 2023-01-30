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
      $nis, '$kelas', '$nama', '$password', '$alamat', '$telp', 6000000
    )");

    return $this->db->query("INSERT INTO tb_spp VALUES
                            ('', $nis, 'Januari', null),
                            ('', $nis, 'Februari', null),
                            ('', $nis, 'Maret', null),
                            ('', $nis, 'April', null),
                            ('', $nis, 'Mei', null),
                            ('', $nis, 'Juni', null),
                            ('', $nis, 'Juli', null),
                            ('', $nis, 'Agustus', null),
                            ('', $nis, 'September', null),
                            ('', $nis, 'Oktober', null),
                            ('', $nis, 'November', null),
                            ('', $nis, 'Desember', null)");
  }
}