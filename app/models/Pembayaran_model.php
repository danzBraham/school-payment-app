<?php
class Pembayaran_model {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllSiswa() {
    return $this->db->results("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas)");
  }

  public function searchSiswaByNis() {
    $nis = $_POST['nis'];
    return $this->db->result("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) INNER JOIN tb_thn_ajaran USING(thn_ajaran) INNER JOIN tb_spp USING(nis) WHERE nis LIKE '%$nis%'");
  }

  public function getSiswaHistory() {
    $nis = $_POST['nis'];
    return $this->db->results("SELECT * FROM tb_spp WHERE nis LIKE '%$nis%'");
  }

  public function addPembayaran($data) {
    $nis = $data['nis'];
    $dataSiswa = $this->db->result("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) INNER JOIN tb_thn_ajaran USING(thn_ajaran) WHERE nis = $nis");
    $nominalBayar = $dataSiswa['nominal'];
    $jumlahBayar = intval($data['jml-bayar']);

    // Payment Logic By Me
    while ($jumlahBayar > 0) {
      $dataSPP = $this->db->result("SELECT * FROM tb_spp WHERE nis = $nis AND (jumlah_bayar < 500000 OR jumlah_bayar IS NULL)");
      if (!$dataSPP) {
        return;
      }
      $jumlahBayarSPP = intval($dataSPP['jumlah_bayar']);
      $bulan = $dataSPP['bulan'];

      if ($jumlahBayarSPP == 0) {
        if ($jumlahBayar > $nominalBayar) {
          $tagihanLebih = $jumlahBayar - $nominalBayar;
          $bayar = $jumlahBayar - $tagihanLebih;
          $this->db->query("UPDATE tb_spp SET
                            tgl_bayar = NOW(),
                            jumlah_bayar = $bayar 
                            WHERE nis = $nis AND bulan = '$bulan'");
          $jumlahBayar = $tagihanLebih;
        } else {
          $this->db->query("UPDATE tb_spp SET
                            tgl_bayar = NOW(),
                            jumlah_bayar = $jumlahBayar
                            WHERE nis = $nis AND bulan = '$bulan'");
          $jumlahBayar = 0;
        }
      } else if ($jumlahBayarSPP < $nominalBayar) {
        if (($jumlahBayarSPP + $jumlahBayar) >= $nominalBayar) {
          $sisaTagihan = $nominalBayar - $jumlahBayarSPP;
          $bayar = $jumlahBayarSPP + $sisaTagihan;
          $this->db->query("UPDATE tb_spp SET
                            tgl_bayar = NOW(),
                            jumlah_bayar = $bayar
                            WHERE nis = $nis AND bulan = '$bulan'");
          $jumlahBayar -= $sisaTagihan;
        } else {
          $bayar = $jumlahBayarSPP + $jumlahBayar;
          $this->db->query("UPDATE tb_spp SET
                            tgl_bayar = NOW(),
                            jumlah_bayar = $bayar
                            WHERE nis = $nis AND bulan = '$bulan'");
          $jumlahBayar = 0;
        }
      }
    }

    while ($jumlahBayar > 0) {
      $dataSPP = $this->db->result("SELECT * FROM tb_spp WHERE nis = $nis AND (jumlah_bayar < 500000 OR jumlah_bayar IS NULL)");
      if (!$dataSPP) {
          return;
      }
      $jumlahBayarSPP = intval($dataSPP['jumlah_bayar']);
      $bulan = $dataSPP['bulan'];
      $bayar = min($jumlahBayar, $nominalBayar - $jumlahBayarSPP);

      $this->db->query("UPDATE tb_spp SET tgl_bayar = NOW(), jumlah_bayar = $bayar WHERE nis = $nis AND bulan = '$bulan'");
      $jumlahBayar -= $bayar;
    }

    $tagihanTerbayar = $this->db->result("SELECT SUM(jumlah_bayar) FROM tb_spp WHERE nis = $nis AND jumlah_bayar IS NOT NULL");
    $tagihanTerbayar =  intval($tagihanTerbayar['SUM(jumlah_bayar)']);
    $totalTagihan = $nominalBayar * 12;
    $totalTagihan -= $tagihanTerbayar;
    return $this->db->query("UPDATE tb_siswa SET total_tagihan = $totalTagihan WHERE nis = $nis");
  }
}