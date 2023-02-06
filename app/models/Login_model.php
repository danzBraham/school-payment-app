<?php
class Login_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function login() {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $this->db->query("SELECT * FROM tb_petugas WHERE username = :user AND password = :pass AND level = 'admin'");
    $this->db->bind('user', $user);
    $this->db->bind('pass', $pass);
    $admin = $this->db->result();
    if ($this->db->rowCount() > 0) {
      $_SESSION['id_petugas'] = $admin['id_petugas'];
      $_SESSION['username'] = $admin['username'];
      $_SESSION['level'] = $admin['level'];
      return $this->db->rowCount();
    }

    $this->db->query("SELECT * FROM tb_petugas WHERE username = :user AND password = :pass AND level = 'petugas'");
    $this->db->bind('user', $user);
    $this->db->bind('pass', $pass);
    $petugas = $this->db->result();
    if ($this->db->rowCount() > 0) {
      $_SESSION['id_petugas'] = $petugas['id_petugas'];
      $_SESSION['username'] = $petugas['username'];
      $_SESSION['level'] = $petugas['level'];
      return $this->db->rowCount();
    }

    $this->db->query("SELECT * FROM tb_siswa WHERE nis = :nis AND password = :pass");
    $this->db->bind('nis', $user);
    $this->db->bind('pass', $pass);
    $siswa = $this->db->result();
    if ($this->db->rowCount() > 0) {
      $_SESSION['nis'] = $siswa['nis'];
      $_SESSION['username'] = $siswa['nama'];
      return $this->db->rowCount();
    }
  }
}