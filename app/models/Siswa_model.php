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

  public function insertSPP($nis, $thnAjaran) {
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
                    ('', $nis, 'Juni', null, '$thnAjaran')");
  }

  public function addSiswa($data) {
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
      null, '$kelas', '$nama', '$password', '$alamat', '$telp'
    )");

    $nis = $this->db->lastID();

    $this->insertSPP($nis, $thnAjaran);
    $this->insertSPP($nis, $thnAjaranDepan);
    $this->insertSPP($nis, $thnAjaranLusaDepan);

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