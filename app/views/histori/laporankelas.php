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
        <p>Kelas: <?= $data['kelas']['kelas'] . '-' . $data['kelas']['jurusan']; ?></p>
        <p>Bulan: <?= $data['tanggal']['bulan']; ?></p>
        <p>Tahun: <?= $data['tanggal']['tahun']; ?></p>
      </div>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jumlah Bayar</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($data['laporan'] as $laporan) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $laporan['nama']; ?></td>
            <td>Rp<?= number_format($laporan['jumlah_bayar'], 0, ',', '.'); ?></td>
          </tr>
          <?php endforeach; ?>
          <tr>
            <th colspan="2">Total</th>
            <td>Rp<?= number_format(3000000, 0, ',', '.'); ?></td>
          </tr>
        </tbody>
      </table>
      <div class="tertanda">
        <p>Denpasar, dd-mm-yyyy</p>
        <p>Zidan Abraham</p>
      </div>
    </div>
  </div>
</body>

</html>