<?php
class Siswa_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getTotalSiswa() {
    $this->db->query("SELECT COUNT(*) FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas)");
    return $this->db->result();
  }

  public function getAllSiswa($limit, $offset) {
    $this->db->query("SELECT nis, nama, password, alamat, no_telp, kelas FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) ORDER BY nis DESC LIMIT :limit OFFSET :offset");
    $this->db->bind('limit', $limit);
    $this->db->bind('offset', $offset);
    return $this->db->results();
}

public function getSiswaByNis($nis) {
  $this->db->query("SELECT nis, nama, id_kelas, kelas, no_telp, alamat FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) WHERE nis = :nis");
  $this->db->bind('nis', $nis);
  return $this->db->result();
}

  public function getAllKelas() {
    $this->db->query("SELECT id_kelas, kelas FROM tb_kelas ORDER BY kelas");
    return $this->db->results();
  }

  public function insertSPP($nis, $tahun ,$angkatan) {
    $this->db->query("INSERT INTO tb_spp VALUES
                    ('', :nis, 'Juli', :tahun , null, :angkatan),
                    ('', :nis, 'Agustus', :tahun , null, :angkatan),
                    ('', :nis, 'September', :tahun , null, :angkatan),
                    ('', :nis, 'Oktober', :tahun , null, :angkatan),
                    ('', :nis, 'November', :tahun , null, :angkatan),
                    ('', :nis, 'Desember', :tahun , null, :angkatan),
                    ('', :nis, 'Januari', :tahun , null, :angkatan),
                    ('', :nis, 'Februari', :tahun , null, :angkatan),
                    ('', :nis, 'Maret', :tahun , null, :angkatan),
                    ('', :nis, 'April', :tahun , null, :angkatan),
                    ('', :nis, 'Mei', :tahun , null, :angkatan),
                    ('', :nis, 'Juni', :tahun , null, :angkatan)");

    $this->db->bind('nis', $nis);
    $this->db->bind('tahun', $tahun);
    $this->db->bind('angkatan', $angkatan);

    $this->db->execute();
  }

  public function addSiswa($data) {
    $nis = $data['nis'];
    $nama = $data['nama'];
    $kelas = $data['kelas'];
    $telp = $data['telp'];
    $alamat = $data['alamat'];

    $this->db->query("INSERT INTO tb_siswa VALUES (
      :nis, :kelas, :nama, '123456', :alamat, :telp
    )");

    $this->db->bind('nis', $nis);
    $this->db->bind('kelas', $kelas);
    $this->db->bind('nama', $nama);
    $this->db->bind('alamat', $alamat);
    $this->db->bind('telp', $telp);
    $this->db->execute();

    $firstYear = date('Y');
    $secondYear = date('Y') + 1;
    $tahunMasuk = "$firstYear/$secondYear";

    $this->insertSPP($nis, $tahunMasuk, 'X');
    $this->insertSPP($nis, $tahunMasuk, 'XI');
    $this->insertSPP($nis, $tahunMasuk, 'XII');

    return $this->db->rowCount();
  }

  public function updateSiswa($data) {
    $nis = $data['nis'];
    $nama = $data['nama'];
    $kelas = $data['kelas'];
    $telp = $data['telp'];
    $alamat = $data['alamat'];
  
    $this->db->query("UPDATE tb_siswa SET
                      id_kelas = :kelas,
                      nama = :nama,
                      alamat = :alamat,
                      no_telp = :telp
                      WHERE nis = :nis");
  
    $this->db->bind('kelas', $kelas);
    $this->db->bind('nama', $nama);
    $this->db->bind('alamat', $alamat);
    $this->db->bind('telp', $telp);
    $this->db->bind('nis', $nis);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function deleteSiswa($nis) {
    $this->db->query("DELETE FROM tb_siswa WHERE nis = :nis");
    $this->db->bind('nis', $nis);

    $this->db->execute();
    return $this->db->rowCount();
  }
}