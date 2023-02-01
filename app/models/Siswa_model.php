<?php
class Siswa_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getSiswa($id) {
    return $this->db->result("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) WHERE nis = $id");
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

    $thnAjaran = explode("/", $data['thn-ajaran']);
    $thnAjaranDepan = [$thnAjaran[0] + 1, $thnAjaran[1] + 1];
    $thnAjaranLusaDepan = [$thnAjaran[0] + 2, $thnAjaran[1] + 2];
    $thnAjaran = implode('/', $thnAjaran);
    $thnAjaranDepan = implode('/', $thnAjaranDepan);
    $thnAjaranLusaDepan = implode('/', $thnAjaranLusaDepan);

    $this->db->query("INSERT INTO tb_siswa VALUES (
      $nis, '$kelas', '$nama', '$password', '$alamat', '$telp', 6000000
    )");

    return $this->db->query("INSERT INTO tb_spp VALUES
                            ('', $nis, 'Juli', null, '$thnAjaran'),
                            ('', $nis, 'Agustus', null, '$thnAjaran'),
                            ('', $nis, 'September', null, '$thnAjaran'),
                            ('', $nis, 'Oktober', null, '$thnAjaran'),
                            ('', $nis, 'November', null, '$thnAjaran'),
                            ('', $nis, 'Desember', null, '$thnAjaran'),
                            ('', $nis, 'Januari', null, '$thnAjaran'),
                            ('', $nis, 'Februari', null, '$thnAjaran'),
                            ('', $nis, 'Maret', null, '$thnAjaran'),
                            ('', $nis, 'April', null, '$thnAjaran'),
                            ('', $nis, 'Mei', null, '$thnAjaran'),
                            ('', $nis, 'Juni', null, '$thnAjaran'),
                            ('', $nis, 'Juli', null, '$thnAjaranDepan'),
                            ('', $nis, 'Agustus', null, '$thnAjaranDepan'),
                            ('', $nis, 'September', null, '$thnAjaranDepan'),
                            ('', $nis, 'Oktober', null, '$thnAjaranDepan'),
                            ('', $nis, 'November', null, '$thnAjaranDepan'),
                            ('', $nis, 'Desember', null, '$thnAjaranDepan'),
                            ('', $nis, 'Januari', null, '$thnAjaranDepan'),
                            ('', $nis, 'Februari', null, '$thnAjaranDepan'),
                            ('', $nis, 'Maret', null, '$thnAjaranDepan'),
                            ('', $nis, 'April', null, '$thnAjaranDepan'),
                            ('', $nis, 'Mei', null, '$thnAjaranDepan'),
                            ('', $nis, 'Juni', null, '$thnAjaranDepan'),
                            ('', $nis, 'Juli', null, '$thnAjaranLusaDepan'),
                            ('', $nis, 'Agustus', null, '$thnAjaranLusaDepan'),
                            ('', $nis, 'September', null, '$thnAjaranLusaDepan'),
                            ('', $nis, 'Oktober', null, '$thnAjaranLusaDepan'),
                            ('', $nis, 'November', null, '$thnAjaranLusaDepan'),
                            ('', $nis, 'Desember', null, '$thnAjaranLusaDepan'),
                            ('', $nis, 'Januari', null, '$thnAjaranLusaDepan'),
                            ('', $nis, 'Februari', null, '$thnAjaranLusaDepan'),
                            ('', $nis, 'Maret', null, '$thnAjaranLusaDepan'),
                            ('', $nis, 'April', null, '$thnAjaranLusaDepan'),
                            ('', $nis, 'Mei', null, '$thnAjaranLusaDepan'),
                            ('', $nis, 'Juni', null, '$thnAjaranLusaDepan')");
  }
}