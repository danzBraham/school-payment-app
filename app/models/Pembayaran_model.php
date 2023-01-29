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

  public function updateSPP($bayar, $nis, $bulan) {
    return $this->db->query("UPDATE tb_spp SET
                            jumlah_bayar = $bayar 
                            WHERE nis = $nis AND bulan = '$bulan'");
  }

  public function addPembayaran($data) {
    $nis = $data['nis'];
    $dataSiswa = $this->db->result("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) INNER JOIN tb_thn_ajaran USING(thn_ajaran) WHERE nis = $nis");
    $nominalBayar = $dataSiswa['nominal'];
    $jumlahBayar = intval($data['jml-bayar']);

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
          $this->updateSPP($bayar, $nis, $bulan);
          $jumlahBayar = $tagihanLebih;
        } else {
          $this->updateSPP($jumlahBayar, $nis, $bulan);
          $jumlahBayar = 0;
        }
      } else if ($jumlahBayarSPP < $nominalBayar) {
        if (($jumlahBayarSPP + $jumlahBayar) >= $nominalBayar) {
          $sisaTagihan = $nominalBayar - $jumlahBayarSPP;
          $bayar = $jumlahBayarSPP + $sisaTagihan;
          $this->updateSPP($bayar, $nis, $bulan);
          $jumlahBayar -= $sisaTagihan;
        } else {
          $bayar = $jumlahBayarSPP + $jumlahBayar;
          $this->updateSPP($bayar, $nis, $bulan);
          $jumlahBayar = 0;
        }
      }
    }

    // $newDataSPP = $this->db->result("SELECT * FROM tb_spp WHERE nis = $nis AND jumlab_bayar IS NOT NULL ORDER BY id_spp DESC");
    // $idSPP = $newDataSPP['id_spp'];
    // $this->db->query("INSERT INTO tb_transaksi VALUES (
    //   '', 1, $idSPP, NOW(), $jumlahBayar
    // )");

    $tagihanTerbayar = $this->db->result("SELECT SUM(jumlah_bayar) FROM tb_spp WHERE nis = $nis AND jumlah_bayar IS NOT NULL");
    $tagihanTerbayar =  intval($tagihanTerbayar['SUM(jumlah_bayar)']);
    $totalTagihan = $nominalBayar * 12;
    $totalTagihan -= $tagihanTerbayar;
    return $this->db->query("UPDATE tb_siswa SET total_tagihan = $totalTagihan WHERE nis = $nis");
  }
}