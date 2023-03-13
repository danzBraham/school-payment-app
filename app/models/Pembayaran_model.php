<?php
class Pembayaran_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getSiswaByNis() {
    $keyword = $_POST['keyword'];
    $angkatan = $_POST['angkatan'];

    $this->db->query("SELECT nis, nama, angkatan FROM tb_siswa INNER JOIN tb_spp USING(nis) WHERE nis = :nis OR nama LIKE :keyword AND angkatan = :angkatan");
    $this->db->bind('nis', $keyword);
    $this->db->bind('keyword', "%$keyword%");
    $this->db->bind('angkatan', $angkatan);
    $siswa = $this->db->result();
    if ($this->db->rowCount() < 1) {
      Flasher::setFlash('Siswa', 'failed', 'tidak', 'ditemukan');
      header('Location:' . BASEURL . '/pembayaran');
      exit;
    }

    return $siswa;
  }

  public function getSiswaHistory() {
    $keyword = $_POST['keyword'];
    $angkatan = $_POST['angkatan'];

    $this->db->query("SELECT bulan, jumlah_bayar FROM tb_spp INNER JOIN tb_siswa USING(nis) WHERE nis = :nis OR nama LIKE :keyword AND angkatan = :angkatan");
    $this->db->bind('nis', $keyword);
    $this->db->bind('keyword', "%$keyword%");
    $this->db->bind('angkatan', $angkatan);

    return $this->db->results();
  }

  public function getTagihan() {
    $keyword = $_POST['keyword'];
    $angkatan = $_POST['angkatan'];

    $this->db->query("SELECT SUM(jumlah_bayar) FROM tb_spp INNER JOIN tb_siswa USING(nis) WHERE nis = :nis OR nama LIKE :keyword AND angkatan = :angkatan AND jumlah_bayar IS NOT NULL");
    $this->db->bind('nis', $keyword);
    $this->db->bind('keyword', "%$keyword%");
    $this->db->bind('angkatan', $angkatan);

    $tagihanTerbayar = $this->db->result();
    $tagihanTerbayar =  (int) $tagihanTerbayar['SUM(jumlah_bayar)'];
    $totalTagihan = 500000 * 12;
    $totalTagihan -= $tagihanTerbayar;

    return $totalTagihan;
  }

  public function updateSPP($bayar, $nis, $bulan, $angkatan) {
    $this->db->query("UPDATE tb_spp SET
                      jumlah_bayar = :bayar 
                      WHERE nis = :nis AND bulan = :bulan AND angkatan = :angkatan");
    $this->db->bind('bayar', $bayar);
    $this->db->bind('nis', $nis);
    $this->db->bind('bulan', $bulan);
    $this->db->bind('angkatan', $angkatan);

    $this->db->execute();
  }

  public function addPembayaran($data) {
    $nis = $data['nis'];
    $angkatan = $data['angkatan'];
    $nominalBayar = 500000;
    $jumlahBayar = (int) $data['jml-bayar'];
    $petugas = $_SESSION['id_petugas'];

    $this->db->query("INSERT INTO tb_transaksi VALUES (
      null, :petugas, :nis, NOW(), :jumlahBayar
    )");
    $this->db->bind('petugas', $petugas);
    $this->db->bind('nis', $nis);
    $this->db->bind('jumlahBayar', $jumlahBayar);
    $this->db->execute();

    while ($jumlahBayar > 0) {
      $this->db->query("SELECT * FROM tb_spp WHERE nis = :nis AND angkatan = :angkatan AND (jumlah_bayar < 500000 OR jumlah_bayar IS NULL)");
      $this->db->bind('nis', $nis);
      $this->db->bind('angkatan', $angkatan);
      $dataSPP = $this->db->result();

      if (!$dataSPP) {
        return;
      }

      $jumlahBayarSPP = (int) $dataSPP['jumlah_bayar'];
      $bulan = $dataSPP['bulan'];

      if ($jumlahBayarSPP == 0) {
        if ($jumlahBayar > $nominalBayar) {
          $tagihanLebih = $jumlahBayar - $nominalBayar;
          $bayar = $jumlahBayar - $tagihanLebih;
          $this->updateSPP($bayar, $nis, $bulan, $angkatan);
          $jumlahBayar = $tagihanLebih;
        } else {
          $this->updateSPP($jumlahBayar, $nis, $bulan, $angkatan);
          $jumlahBayar = 0;
        }
      } else if ($jumlahBayarSPP < $nominalBayar) {
        if (($jumlahBayarSPP + $jumlahBayar) >= $nominalBayar) {
          $sisaTagihan = $nominalBayar - $jumlahBayarSPP;
          $bayar = $jumlahBayarSPP + $sisaTagihan;
          $this->updateSPP($bayar, $nis, $bulan, $angkatan);
          $jumlahBayar -= $sisaTagihan;
        } else {
          $bayar = $jumlahBayarSPP + $jumlahBayar;
          $this->updateSPP($bayar, $nis, $bulan, $angkatan);
          $jumlahBayar = 0;
        }
      }
    }

    return $this->db->rowCount();
  }
}