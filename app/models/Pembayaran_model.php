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
    $totalTagihan = $dataSiswa['total_tagihan'];
    $jumlahBayar = intval($data['jml-bayar']);
    $dataSPP = $this->db->result("SELECT * FROM tb_spp WHERE nis = $nis AND (jumlah_bayar < 500000 OR jumlah_bayar IS NULL)");
    $sisaUang = 0;

    // if ($jumlahBayar == $nominalBayar) {
    //   $belum_bayar = $this->db->result("SELECT * FROM tb_spp WHERE nis = $nis AND (jumlah_bayar < 500000 OR jumlah_bayar IS NULL)");
    //   $bulan = $belum_bayar['bulan'];
    //   $this->db->query("UPDATE tb_spp SET
    //                     tgl_bayar = NOW(),
    //                     jumlah_bayar = $jumlahBayar
    //                     WHERE nis = $nis AND bulan = '$bulan'");

    //   $totalTagihan -= $jumlahBayar;
    //   return $this->db->query("UPDATE tb_siswa SET
    //                           total_tagihan = $totalTagihan
    //                           WHERE nis = $nis");
    // } elseif ($jumlahBayar > $nominalBayar) {
    //   $sisaUang += $jumlahBayar - $nominalBayar;
    //   $jumlahBayar -= $sisaUang;
    // }

      foreach($dataSPP as $data) {
        if ($jumlahBayar == $nominalBayar) {
          $bulan = $data['bulan'];
          $this->db->query("UPDATE tb_spp SET
                            tgl_bayar = NOW(),
                            jumlah_bayar = $jumlahBayar
                            WHERE nis = $nis AND bulan = '$bulan'");

          $totalTagihan -= $jumlahBayar;
          $jumlahBayar = 0;
          return $this->db->query("UPDATE tb_siswa SET
                                  total_tagihan = $totalTagihan
                                  WHERE nis = $nis");
        }
      }

    // Perulangan untuk setiap bulan
    // for ($i = 1; $i <= 12; $i++) {
    //   // Cek apakah uang bayar pas atau lebih
    //   if ($jumlahBayar == $nominalBayar) {
    //     echo "Tagihan di bulan ke-" . $i . " sudah terbayar\n";
    //   } elseif ($jumlahBayar > $tagihan) {
    //     $sisaUang += $jumlahBayar - $tagihan;
    //     echo "Tagihan di bulan ke-" . $i . " sudah terbayar dan sisa uang sebesar " . ($jumlahBayar - $tagihan) . "\n";
    //   } else {
    //     echo "Tagihan di bulan ke-" . $i . " belum terbayar\n";
    //   }

    //   // Cek sisa uang
    //   if ($sisaUang >= $tagihan) {
    //     $sisaUang -= $tagihan;
    //     echo "Tagihan di bulan ke-" . ($i + 1) . " sudah terbayar dengan sisa uang " . $sisaUang . "\n";
    //   } else {
    //     $tagihan -= $sisaUang;
    //     echo "Tagihan di bulan ke-" . ($i + 1) . " sebesar " . $tagihan . " dengan sisa uang " . $sisaUang . "\n";
    //   }
    // }
  }
}