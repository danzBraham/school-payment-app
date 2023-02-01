<?php
class Siswa_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getSiswa($nis) {
    return $this->db->result("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) WHERE nis = $nis");
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
    $thnSatu = intval($thnAjaran[0]);
    $thnDua = intval($thnAjaran[1]);
    $thnAjaranDepan = [$thnSatu + 1, $thnDua + 1];
    $thnAjaranLusaDepan = [$thnSatu + 2, $thnDua + 2];
    $thnAjaran = implode('/', $thnAjaran);
    $thnAjaranDepan = implode('/', $thnAjaranDepan);
    $thnAjaranLusaDepan = implode('/', $thnAjaranLusaDepan);

    $this->db->query("INSERT INTO tb_siswa VALUES (
      $nis, '$kelas', '$nama', '$password', '$alamat', '$telp'
    )");

    $this->db->query("INSERT INTO tb_spp VALUES
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

    return $this->db->rowCount();
  }

  public function updateSiswa($data) {
    $nis = intval($data['nis']);
    $nama = $data['nama'];
    $password = $data['password'];
    $kelas = $data['kelas'];
    $telp = $data['telp'];
    $alamat = $data['alamat'];

    $this->db->query("UPDATE tb_siswa SET
                      id_kelas = '$kelas',
                      nama = '$nama',
                      password = '$password',
                      alamat = '$alamat',
                      no_telp = '$telp'
                      WHERE nis = $nis");

    return $this->db->rowCount();
  }

  public function deleteSiswa($nis) {
    $this->db->query("DELETE FROM tb_transaksi WHERE nis = $nis");
    $this->db->query("DELETE FROM tb_spp WHERE nis = $nis");
    $this->db->query("DELETE FROM tb_siswa WHERE nis = $nis");
    return $this->db->rowCount();
  }
}