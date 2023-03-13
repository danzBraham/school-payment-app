<?php
class Histori_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getTotalTransaksi() {
    $this->db->query("SELECT COUNT(*) FROM tb_transaksi");
    return $this->db->result();
  }

  public function getTotalTransaksiBySiswa() {
    $nis = $_SESSION['nis'];
    $this->db->query("SELECT COUNT(*) FROM tb_transaksi WHERE nis = :nis");
    $this->db->bind('nis', $nis);
    
    return $this->db->result();
  }

  public function getAllTransaksi($limit, $offset) {
    $this->db->query("SELECT username, nama, tgl_bayar, bayar FROM tb_transaksi INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) ORDER BY tgl_bayar DESC LIMIT :limit OFFSET :offset");
    $this->db->bind('limit', $limit);
    $this->db->bind('offset', $offset);

    return $this->db->results();
  }

  public function getTransaksiBySiswa($limit, $offset) {
    $nis = $_SESSION['nis'];
    $this->db->query("SELECT username, nama, tgl_bayar, bayar FROM tb_transaksi INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) WHERE nis = :nis ORDER BY tgl_bayar DESC LIMIT :limit OFFSET :offset");
    $this->db->bind('nis', $nis);
    $this->db->bind('limit', $limit);
    $this->db->bind('offset', $offset);

    return $this->db->results();
  }

  public function getAllKelas() {
    $this->db->query("SELECT id_kelas, kelas FROM tb_kelas");
    return $this->db->results();
  }

  public function getKelas() {
    $kelas = $_POST['kelas'];

    $this->db->query("SELECT kelas FROM tb_kelas WHERE id_kelas = :kelas");
    $this->db->bind('kelas', $kelas);

    return $this->db->result();
  }

  public function getALlThnMasuk() {
    $this->db->query("SELECT tahun_angkatan FROM tb_spp GROUP BY tahun_angkatan");
    return $this->db->results();
  }

  public function getThnMasuk() {
    $tahun = $_POST['tahun'];

    $this->db->query("SELECT tahun_angkatan FROM tb_spp WHERE tahun_angkatan = :tahun");
    $this->db->bind('tahun', $tahun);

    return $this->db->result();
  }

  public function getAllBulan() {
    $this->db->query("SELECT bulan FROM tb_spp GROUP BY bulan ORDER BY id_spp");
    return $this->db->results();
  }

  public function getALlSiswaByKelasAndTahun() {
    $kelas = $_POST['kelas'];
    $tahun = $_POST['tahun'];

    $this->db->query("SELECT nama FROM tb_siswa INNER JOIN tb_spp USING(nis) WHERE id_kelas = :kelas AND tahun_angkatan = :tahun GROUP BY nama ORDER BY nama ASC");
    $this->db->bind('kelas', $kelas);
    $this->db->bind('tahun', $tahun);

    return $this->db->results();
  }

  public function laporanKelas() {
    $kelas = $_POST['kelas'];
    $tahun = $_POST['tahun'];

    $this->db->query("SELECT * FROM tb_spp INNER JOIN tb_siswa USING(nis) INNER JOIN tb_kelas USING(id_kelas) WHERE id_kelas = :kelas AND tahun_angkatan = :tahun ORDER BY nama ASC");
    $this->db->bind('kelas', $kelas);
    $this->db->bind('tahun', $tahun);

    return $this->db->results();
  }

  public function getTerbayarKelas() {
    $kelas = $_POST['kelas'];
    $tahun = $_POST['tahun'];

    $this->db->query("SELECT nama, angkatan, SUM(jumlah_bayar) FROM tb_spp INNER JOIN tb_siswa USING(nis) INNER JOIN tb_kelas USING(id_kelas) WHERE id_kelas = :kelas AND tahun_angkatan = :tahun AND (jumlah_bayar IS NULL OR jumlah_bayar IS NOT NULL) GROUP BY nama, angkatan ORDER BY nama ASC");
    $this->db->bind('kelas', $kelas);
    $this->db->bind('tahun', $tahun);
    $totalTerbayar = $this->db->results();

    return $totalTerbayar;
  }

  public function getTotalTerbayarKelas() {
    $kelas = $_POST['kelas'];
    $tahun = $_POST['tahun'];

    $this->db->query("SELECT SUM(jumlah_bayar) FROM tb_spp INNER JOIN tb_siswa USING(nis) INNER JOIN tb_kelas USING(id_kelas) WHERE id_kelas = :kelas AND tahun_angkatan = :tahun AND jumlah_bayar IS NOT NULL ORDER BY nama ASC");
    $this->db->bind('kelas', $kelas);
    $this->db->bind('tahun', $tahun);
    $total = $this->db->result();

    return $total['SUM(jumlah_bayar)'];
  }

  public function getTotalTagihanKelas() {
    $kelas = $_POST['kelas'];
    $tahun = $_POST['tahun'];

    $this->db->query("SELECT COUNT(*) FROM tb_spp INNER JOIN tb_siswa USING(nis) INNER JOIN tb_kelas USING(id_kelas) WHERE id_kelas = :kelas AND tahun_angkatan = :tahun ORDER BY nama ASC");
    $this->db->bind('kelas', $kelas);
    $this->db->bind('tahun', $tahun);
    $jumlah = $this->db->result();

    return $jumlah['COUNT(*)'] *= 500000;
  }

  public function getSiswaByNis() {
    $keyword = $_POST['keyword'];

    $this->db->query("SELECT nama, kelas, tahun_angkatan FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) INNER JOIN tb_spp USING(nis) WHERE nis = :nis OR nama LIKE :keyword");
    $this->db->bind('nis', $keyword);
    $this->db->bind('keyword', "%$keyword%");
    $siswaByNis = $this->db->result();
    if ($this->db->rowCount() < 1) {
      Flasher::setFlash('Siswa', 'failed', 'tidak', 'ditemukan');
      header('Location:' . BASEURL . '/histori');
      exit;
    }

    return $siswaByNis;
  }

  public function laporanSiswa() {
    $keyword = $_POST['keyword'];

    $this->db->query("SELECT angkatan, jumlah_bayar FROM tb_spp INNER JOIN tb_siswa USING(nis) WHERE nis = :nis OR nama LIKE :keyword");
    $this->db->bind('nis', $keyword);
    $this->db->bind('keyword', "%$keyword%");

    return $this->db->results();
  }

  public function getTerbayarSiswa() {
    $keyword = $_POST['keyword'];

    $this->db->query("SELECT angkatan, SUM(jumlah_bayar) FROM tb_spp INNER JOIN tb_siswa USING(nis) WHERE nis = :nis OR nama LIKE :keyword GROUP BY angkatan");
    $this->db->bind('nis', $keyword);
    $this->db->bind('keyword', "%$keyword%");

    return $this->db->results();
  }

  public function getTotalTerbayarSiswa() {
    $keyword = $_POST['keyword'];

    $this->db->query("SELECT SUM(jumlah_bayar) FROM tb_spp INNER JOIN tb_siswa USING(nis) WHERE nis = :nis OR nama LIKE :keyword AND jumlah_bayar IS NOT NULL");
    $this->db->bind('nis', $keyword);
    $this->db->bind('keyword', "%$keyword%");
    $total = $this->db->result();

    return $total['SUM(jumlah_bayar)'];
  }

  public function getTotalTagihanSiswa() {
    $keyword = $_POST['keyword'];

    $this->db->query("SELECT COUNT(*) FROM tb_spp INNER JOIN tb_siswa USING(nis) WHERE nis = :nis OR nama LIKE :keyword");
    $this->db->bind('nis', $keyword);
    $this->db->bind('keyword', "%$keyword%");
    $tagihan = $this->db->result();

    return $tagihan['COUNT(*)'] *= 500000;
  }
}