<?php
class Histori_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllTransaksi() {
    $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) ORDER BY tgl_bayar DESC LIMIT 12");
    return $this->db->results();
  }

  public function getAllKelas() {
    $this->db->query("SELECT * FROM tb_kelas");
    return $this->db->results();
  }

  public function getAllBulan() {
    $this->db->query("SELECT * FROM tb_spp GROUP BY bulan ORDER BY id_spp");
    return $this->db->results();
  }

  public function getAllTahun() {
    $this->db->query("SELECT * FROM tb_spp GROUP BY tahun");
    return $this->db->results();
  }

  public function getKelas() {
    $kelas = $_POST['kelas'];
    $this->db->query("SELECT * FROM tb_kelas WHERE id_kelas = :kelas");
    $this->db->bind('kelas', $kelas);
    return $this->db->result();
  }

  public function getALlSiswaByKelas() {
    $kelas = $_POST['kelas'];
    $this->db->query("SELECT * FROM tb_siswa WHERE id_kelas = :kelas ORDER BY nama ASC");
    $this->db->bind('kelas', $kelas);
    return $this->db->results();
  }

  public function LaporanKelas() {
    $kelas = $_POST['kelas'];

    $this->db->query("SELECT * FROM tb_kelas WHERE id_kelas = :kelas");
    $this->db->bind('kelas', $kelas);
    $dataKelas = $this->db->result();
    $angkatan = $dataKelas['kelas'];

    $this->db->query("SELECT * FROM tb_spp INNER JOIN tb_siswa USING(nis) INNER JOIN tb_kelas USING(id_kelas) WHERE id_kelas = :kelas AND angkatan = :angkatan ORDER BY nama ASC");
    $this->db->bind('kelas', $kelas);
    $this->db->bind('angkatan', $angkatan);
    return $this->db->results();
  }

  public function searchSiswaByNis() {
    $keyword = $_POST['keyword'];

    $this->db->query("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) WHERE nis = :nis OR nama LIKE :keyword");
    $this->db->bind('nis', $keyword);
    $this->db->bind('keyword', "%$keyword%");
    $data = $this->db->result();

    if ($this->db->rowCount() < 1) {
      Flasher::setFlash('Siswa', 'failed', 'tidak', 'ditemukan');
      header('Location:' . BASEURL . '/pembayaran');
      exit;
    }

    $nis = $data['nis'];
    $kelas = $data['kelas'];

    $this->db->query("SELECT * FROM tb_siswa INNER JOIN tb_spp USING(nis) WHERE nis = :nis AND angkatan = :kelas");
    $this->db->bind('nis', $nis);
    $this->db->bind('kelas', $kelas);
    return $this->db->result();
  }

  public function getSiswaHistory() {
    $keyword = $_POST['keyword'];

    $this->db->query("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) WHERE nis = :nis OR nama LIKE :keyword");
    $this->db->bind('nis', $keyword);
    $this->db->bind('keyword', "%$keyword%");
    $data = $this->db->result();
    $nis = $data['nis'];
    $kelas = $data['kelas'];

    $this->db->query("SELECT * FROM tb_spp WHERE nis = :nis AND angkatan = :kelas");
    $this->db->bind('nis', $nis);
    $this->db->bind('kelas', $kelas);
    return $this->db->results();
  }

  public function getTotalKelas() {
    $kelas = $_POST['kelas'];

    $this->db->query("SELECT * FROM tb_kelas WHERE id_kelas = :kelas");
    $this->db->bind('kelas', $kelas);
    $dataKelas = $this->db->result();
    $angkatan = $dataKelas['kelas'];

    $this->db->query("SELECT nama, SUM(jumlah_bayar) FROM tb_spp INNER JOIN tb_siswa USING(nis) INNER JOIN tb_kelas USING(id_kelas) WHERE id_kelas = :kelas AND angkatan = :angkatan AND jumlah_bayar IS NOT NULL GROUP BY nama ORDER BY nama ASC;");
    $this->db->bind('kelas', $kelas);
    $this->db->bind('angkatan', $angkatan);
    $totalTerbayar = $this->db->results();
    return $totalTerbayar;
  }

  public function getTotalSiswa() {
    $keyword = $_POST['keyword'];

    $this->db->query("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) WHERE nis = :nis OR nama LIKE :keyword");
    $this->db->bind('nis', $keyword);
    $this->db->bind('keyword', "%$keyword%");
    $data = $this->db->result();
    $nis = $data['nis'];
    $kelas = $data['kelas'];

    $this->db->query("SELECT SUM(jumlah_bayar) FROM tb_spp WHERE nis = :nis AND angkatan = :kelas");
    $this->db->bind('nis', $nis);
    $this->db->bind('kelas', $kelas);
    $totalTerbayar = $this->db->result();
    return intval($totalTerbayar['SUM(jumlah_bayar)']);
  }

  public function getTagihanSiswa() {
    $keyword = $_POST['keyword'];

    $this->db->query("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) WHERE nis = :nis OR nama LIKE :keyword");
    $this->db->bind('nis', $keyword);
    $this->db->bind('keyword', "%$keyword%");
    $data = $this->db->result();
    $nis = $data['nis'];
    $kelas = $data['kelas'];

    $this->db->query("SELECT COUNT(*) FROM tb_spp WHERE nis = :nis AND angkatan = :kelas");
    $this->db->bind('nis', $nis);
    $this->db->bind('kelas', $kelas);
    $totalData = $this->db->result();

    $this->db->query("SELECT SUM(jumlah_bayar) FROM tb_spp WHERE nis = :nis AND angkatan = :kelas");
    $this->db->bind('nis', $nis);
    $this->db->bind('kelas', $kelas);
    $totalTerbayar = $this->db->result();

    $totalBayar = intval($totalData['COUNT(*)']) * 500000;
    $totalTagihan = $totalBayar - intval($totalTerbayar['SUM(jumlah_bayar)']);
    return $totalTagihan;
  }
}