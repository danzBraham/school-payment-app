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
    $tahun = $_POST['tahun'];
    return $this->db->result("SELECT * FROM tb_siswa INNER JOIN tb_spp USING(nis) WHERE nis LIKE '%$nis%' AND thn_ajaran = '$tahun'");
  }

  public function getSiswaHistory() {
    $nis = $_POST['nis'];
    $tahun = $_POST['tahun'];
    return $this->db->results("SELECT * FROM tb_spp WHERE nis LIKE '%$nis%' AND thn_ajaran = '$tahun'");
  }

  public function updateSPP($bayar, $nis, $bulan, $tahun) {
    return $this->db->query("UPDATE tb_spp SET
                            jumlah_bayar = $bayar 
                            WHERE nis = $nis AND bulan = '$bulan' AND thn_ajaran = '$tahun'");
  }

  public function addPembayaran($data) {
    $nis = $data['nis'];
    $tahun = $data['tahun-ajaran'];
    $dataSiswa = $this->db->result("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) WHERE nis = $nis");
    $dataSPP = $this->db->result("SELECT * FROM tb_spp WHERE nis = $nis AND thn_ajaran = '$tahun' AND (jumlah_bayar < 500000 OR jumlah_bayar IS NULL)");
    $idSPP = $dataSPP['id_spp'];
    $nominalBayar = 500000;
    $jumlahBayar = intval($data['jml-bayar']);
    $tagihanSiswa = $dataSiswa['total_tagihan'];

    if ($jumlahBayar > $tagihanSiswa) {
      echo "<script>
              alert('Jumlah bayar melebihi tagihan');
            </script>";
      return;
    }

    $this->db->query("INSERT INTO tb_transaksi VALUES (
      '', 1, $idSPP, NOW(), $jumlahBayar
    )");

    while ($jumlahBayar > 0) {
      $dataSPPLoop = $this->db->result("SELECT * FROM tb_spp WHERE nis = $nis AND thn_ajaran = '$tahun' AND (jumlah_bayar < 500000 OR jumlah_bayar IS NULL)");
      $idSPP = $dataSPPLoop['id_spp'];
      if (!$dataSPPLoop) {
        return;
      }
      $jumlahBayarSPP = intval($dataSPPLoop['jumlah_bayar']);
      $bulan = $dataSPPLoop['bulan'];

      if ($jumlahBayarSPP == 0) {
        if ($jumlahBayar > $nominalBayar) {
          $tagihanLebih = $jumlahBayar - $nominalBayar;
          $bayar = $jumlahBayar - $tagihanLebih;
          $this->updateSPP($bayar, $nis, $bulan, $tahun);
          $jumlahBayar = $tagihanLebih;
        } else {
          $this->updateSPP($jumlahBayar, $nis, $bulan, $tahun);
          $jumlahBayar = 0;
        }
      } else if ($jumlahBayarSPP < $nominalBayar) {
        if (($jumlahBayarSPP + $jumlahBayar) >= $nominalBayar) {
          $sisaTagihan = $nominalBayar - $jumlahBayarSPP;
          $bayar = $jumlahBayarSPP + $sisaTagihan;
          $this->updateSPP($bayar, $nis, $bulan, $tahun);
          $jumlahBayar -= $sisaTagihan;
        } else {
          $bayar = $jumlahBayarSPP + $jumlahBayar;
          $this->updateSPP($bayar, $nis, $bulan, $tahun);
          $jumlahBayar = 0;
        }
      }
    }

    // $tagihanTerbayar = $this->db->result("SELECT SUM(jumlah_bayar) FROM tb_spp WHERE nis = $nis AND jumlah_bayar IS NOT NULL");
    // $tagihanTerbayar = intval($tagihanTerbayar['SUM(jumlah_bayar)']);
    // $totalTagihan = $nominalBayar * 12;
    // $totalTagihan -= $tagihanTerbayar;
    // return $this->db->query("UPDATE tb_siswa SET total_tagihan = $totalTagihan WHERE nis = $nis");
  }

  public function getTagihan() {
    $nis = $_POST['nis'];
    $tahun = $_POST['tahun'];
    $tagihanTerbayar = $this->db->result("SELECT SUM(jumlah_bayar) FROM tb_spp WHERE nis = $nis AND thn_ajaran = '$tahun' AND jumlah_bayar IS NOT NULL");
    $tagihanTerbayar =  intval($tagihanTerbayar['SUM(jumlah_bayar)']);
    $totalTagihan = 500000 * 12;
    $totalTagihan -= $tagihanTerbayar;
    return $totalTagihan;
  }
}