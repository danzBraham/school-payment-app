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
        <p>Kelas: <?= $data['kelas']['id_kelas']; ?></p>
        <p>Bulan: <?= $data['tanggal']['bulan']; ?></p>
        <p>Tahun: <?= $data['tanggal']['tahun']; ?></p>
      </div>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jumlah Bayar</th>
            <th>Tagihan</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($data['laporan'] as $laporan) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $laporan['nama']; ?></td>
            <td>Rp<?= number_format($laporan['jumlah_bayar'], 0, ',', '.'); ?></td>
            <?php $nominal = 500000; ?>
            <?php if ($laporan['jumlah_bayar'] - $nominal == 0) : ?>
              <td>Rp0</td>
              <?php elseif ($laporan['jumlah_bayar'] - $nominal < $nominal) : ?>
                <td>Rp<?= number_format($nominal - $laporan['jumlah_bayar'], 0, ',', '.'); ?></td>
            <?php endif; ?>
          </tr>
          <?php endforeach; ?>
          <tr class="information">
            <th colspan="2">Total</th>
            <td>Rp<?= number_format($data['total'], 0, ',', '.'); ?></td>
            <td>Rp<?= number_format($data['tagihan'], 0, ',', '.'); ?></td>
          </tr>
          <!-- <tr class="information">
            <th colspan="2">Tagihan</th>
          </tr> -->
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