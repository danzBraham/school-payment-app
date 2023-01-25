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

    $nominal = $this->db->result("SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) INNER JOIN tb_thn_ajaran USING(thn_ajaran) WHERE nis = $nis");

    $belumBayar = $this->db->results("SELECT * FROM tb_spp WHERE nis = $nis AND (jumlah_bayar IS NULL OR jumlah_bayar < 500000)");

    $nominalBayar = $nominal['nominal'];
    $sisaUang = 0;

    foreach ($belumBayar as $b) {
      $jumlahBayar = $data['jml-bayar'];
      if ($jumlahBayar == $nominalBayar) {
        
      }
    }

    // Perulangan untuk setiap bulan
    for ($i = 1; $i <= 12; $i++) {
      // Input jumlah uang yang dibayar
      $uangBayar = readline("Masukkan jumlah uang yang dibayar pada bulan ke-" . $i . ": ");

      // Cek apakah uang bayar pas atau lebih
      if ($uangBayar == $tagihan) {
        echo "Tagihan di bulan ke-" . $i . " sudah terbayar\n";
      } elseif ($uangBayar > $tagihan) {
        $sisaUang += $uangBayar - $tagihan;
        echo "Tagihan di bulan ke-" . $i . " sudah terbayar dan sisa uang sebesar " . ($uangBayar - $tagihan) . "\n";
      } else {
        echo "Tagihan di bulan ke-" . $i . " belum terbayar\n";
      }

      // Cek sisa uang
      if ($sisaUang >= $tagihan) {
        $sisaUang -= $tagihan;
        echo "Tagihan di bulan ke-" . ($i + 1) . " sudah terbayar dengan sisa uang " . $sisaUang . "\n";
      } else {
        $tagihan -= $sisaUang;
        echo "Tagihan di bulan ke-" . ($i + 1) . " sebesar " . $tagihan . " dengan sisa uang " . $sisaUang . "\n";
      }
    }
  }
}