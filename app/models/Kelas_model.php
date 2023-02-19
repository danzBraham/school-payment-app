<?php
class Kelas_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllKelas() {
    $this->db->query("SELECT * FROM tb_kelas ORDER BY kelas ASC");
    return $this->db->results();
  }

  public function getKelasById($id) {
    $this->db->query("SELECT * FROM tb_kelas WHERE id_kelas = :id");
    $this->db->bind('id', $id);
    return $this->db->result();
  }

  public function getAngkatan() {
    $this->db->query("SELECT * FROM tb_kelas GROUP BY angkatan");
    return $this->db->results();
  }

  public function getJurusan() {
    $this->db->query("SELECT * FROM tb_kelas GROUP BY jurusan");
    return $this->db->results();
  }

  public function addKelas() {
    $kelas = $_POST['kelas'];
    $angkatan = $_POST['angkatan'];
    $jurusan = $_POST['jurusan'];

    $this->db->query("INSERT INTO tb_kelas VALUES (
      null, :kelas, :angkatan, :jurusan
    )");
    $this->db->bind('kelas', $kelas);
    $this->db->bind('angkatan', $angkatan);
    $this->db->bind('jurusan', $jurusan);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function updateKelas($data) {
    $idKelas = $data['id_kelas'];
    $kelas = $data['kelas'];
    $angkatan = $data['angkatan'];
    $jurusan = $data['jurusan'];

    $this->db->query("UPDATE tb_kelas SET
                      kelas = :kelas,
                      angkatan = :angkatan,
                      jurusan = :jurusan
                      WHERE id_kelas = :id_kelas");
  
    $this->db->bind('id_kelas', $idKelas);
    $this->db->bind('kelas', $kelas);
    $this->db->bind('angkatan', $angkatan);
    $this->db->bind('jurusan', $jurusan);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function deleteKelas($id) {
    $this->db->query("DELETE FROM tb_kelas WHERE id_kelas = :id");
    $this->db->bind('id', $id);
    $this->db->execute();

    return $this->db->rowCount();
  }
}