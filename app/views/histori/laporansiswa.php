<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php $data['title']; ?></title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/CSS/report.php">
</head>

<body>
  <div class="container-laporan">
    <h1>Laporan SPP</h1>
    <div class="laporan">
      <div class="laporan-info">
        <p>Nama: <?= $data['siswa']['nama']; ?></p>
        <p>Kelas: <?= $data['siswa']['id_kelas']; ?></p>
      </div>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Bulan</th>
            <th>Jumlah Bayar</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($data['histori'] as $histori) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $histori['bulan']; ?></td>
            <td>Rp<?= number_format($histori['jumlah_bayar'], 0, ',', '.'); ?></td>
          </tr>
          <?php endforeach; ?>
          <tr class="information">
            <th colspan="2">Total</th>
            <td>Rp<?= number_format($data['total'], 0, ',', '.'); ?></td>
          </tr>
          <tr class="information">
            <th colspan="2">Tagihan</th>
            <td>Rp<?= number_format($data['tagihan'], 0, ',', '.'); ?></td>
          </tr>
        </tbody>
      </table>
      <div class="tertanda">
        <p>Denpasar, <?= date('d-m-Y'); ?></p>
        <p>Zidan Abraham</p>
      </div>
      <div class="layer"></div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.print();
      window.onafterprint = () => history.back();
    });
  </script>
</body>


</html>