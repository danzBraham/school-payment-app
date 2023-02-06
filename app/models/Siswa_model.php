<?php
class Siswa_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllSiswa() {
    $this->db->query("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas)");
    return $this->db->results();
  }

  public function getSiswa($nis) {
    $this->db->query("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) WHERE nis = :nis");
    $this->db->bind('nis', $nis);
    return $this->db->result();
  }

  public function getAllKelas() {
    $this->db->query("SELECT * FROM tb_kelas");
    return $this->db->results();
  }

  public function insertSPP($nis, $thnAjaran) {
    $this->db->query("INSERT INTO tb_spp VALUES
                    ('', :nis, 'Juli', null, :thnAjaran),
                    ('', :nis, 'Agustus', null, :thnAjaran),
                    ('', :nis, 'September', null, :thnAjaran),
                    ('', :nis, 'Oktober', null, :thnAjaran),
                    ('', :nis, 'November', null, :thnAjaran),
                    ('', :nis, 'Desember', null, :thnAjaran),
                    ('', :nis, 'Januari', null, :thnAjaran),
                    ('', :nis, 'Februari', null, :thnAjaran),
                    ('', :nis, 'Maret', null, :thnAjaran),
                    ('', :nis, 'April', null, :thnAjaran),
                    ('', :nis, 'Mei', null, :thnAjaran),
                    ('', :nis, 'Juni', null, :thnAjaran)");

    $this->db->bind('nis', $nis);
    $this->db->bind('thnAjaran', $thnAjaran);
    $this->db->execute();
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
      '', :id_kelas, :nama, :password, :alamat, :telp
    )");

    $this->db->bind('id_kelas', $kelas);
    $this->db->bind('nama', $nama);
    $this->db->bind('password', $password);
    $this->db->bind('alamat', $alamat);
    $this->db->bind('telp', $telp);
    $this->db->execute();
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
                      id_kelas = :id_kelas,
                      nama = :nama,
                      password = :password,
                      alamat = :alamat,
                      no_telp = :no_telp
                      WHERE nis = :nis");
  
    $this->db->bind('id_kelas', $kelas);
    $this->db->bind('nama', $nama);
    $this->db->bind('password', $password);
    $this->db->bind('alamat', $alamat);
    $this->db->bind('no_telp', $telp);
    $this->db->bind('nis', $nis);
    $this->db->execute();
    return $this->db->rowCount();
  }  

  public function deleteSiswa($nis) {
    $this->db->query("DELETE FROM tb_transaksi WHERE nis = :nis");
    $this->db->bind('nis', $nis);
    $this->db->execute();

    $this->db->query("DELETE FROM tb_spp WHERE nis = :nis");
    $this->db->bind('nis', $nis);
    $this->db->execute();

    $this->db->query("DELETE FROM tb_siswa WHERE nis = :nis");
    $this->db->bind('nis', $nis);
    $this->db->execute();

    return $this->db->rowCount();
  }
}