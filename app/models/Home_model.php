<?php
class Home_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function login() {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $this->db->query("SELECT * FROM tb_petugas WHERE username = :user AND password = :pass");
    $this->db->bind('user', $user);
    $this->db->bind('pass', $pass);
    $this->db->execute();
    $data = $this->db->result();

    if ($data && $data['username'] == 'admin' && $data['level'] == 'admin') {
        session_unset();
        $_SESSION['login'] = true;
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];
        return $this->db->rowCount();
      } elseif ( $data && $data['username'] == 'petugas' && $data['level'] == 'petugas') {
        session_unset();
        $_SESSION['login'] = true;
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];
        return $this->db->rowCount();
      } else {
        $this->db->query("SELECT * FROM tb_siswa WHERE nis = :nis AND password = :pass");
        $this->db->bind('nis', $user);
        $this->db->bind('pass', $pass);
        $siswa = $this->db->result();
        if ($siswa && $siswa['nis'] == $user && $siswa['password'] == $pass) {
          session_unset();
          $_SESSION['login'] = true;
          $_SESSION['nis'] = $siswa['nis'];
          $_SESSION['username'] = $siswa['nama'];
          return $this->db->rowCount();
        } else {
        return 0;
        }
    }
  }

  public function out() {
    session_start();
    session_unset();
    session_destroy();
  }
}