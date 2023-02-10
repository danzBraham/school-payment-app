<?php
class Petugas_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllPetugas() {
    $this->db->query("SELECT * FROM tb_petugas");
    return $this->db->results();
  }

  public function getPetugasById($id) {
    $this->db->query("SELECT * FROM tb_petugas WHERE id_petugas = :id");
    $this->db->bind('id', $id);
    return $this->db->result();
  }

  public function addPetugas() {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $this->db->query("INSERT INTO tb_petugas VALUES (
      null, :user, :pass, :level
    )");
    $this->db->bind('user', $username);
    $this->db->bind('pass', $password);
    $this->db->bind('level', $level);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function updatePetugas() {
    $id = $_POST['id_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $this->db->query("UPDATE tb_petugas SET
                      username = :user,
                      password = :pass,
                      level = :level
                      WHERE id_petugas = :id");

    $this->db->bind('user', $username);
    $this->db->bind('pass', $password);
    $this->db->bind('level', $level);
    $this->db->bind('id', $id);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function deletePetugas($id) {
    $this->db->query("DELETE FROM tb_petugas WHERE id_petugas = :id");
    $this->db->bind('id', $id);
    $this->db->execute();
    return $this->db->rowCount();
  }
}