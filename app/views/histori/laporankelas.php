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
        <p>Kelas: <?= $data['kelas']['kelas']; ?></p>
      </div>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <?php foreach ($data['bulan'] as $bulan) : ?>
            <th><?= $bulan['bulan']; ?></th>
            <?php endforeach; ?>
            <th>Terbayar</th>
            <th>Tagihan</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($data['siswa'] as $siswa) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $siswa['nama']; ?></td>
            <?php foreach ($data['laporan'] as $laporan) : ?>
              <?php if ($siswa['nama'] == $laporan['nama']) : ?>
              <td>Rp<?= number_format($laporan['jumlah_bayar'], 0, ',', '.'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach ($data['terbayar'] as $terbayar) : ?>
              <?php if ($siswa['nama'] == $terbayar['nama']) : ?>
              <td class="laporan-info">Rp<?= number_format($terbayar['SUM(jumlah_bayar)'], 0, ',', '.'); ?></td>
              <td class="laporan-info">Rp<?= number_format(6000000 - $terbayar['SUM(jumlah_bayar)'], 0, ',', '.'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
          </tr>
          <?php endforeach; ?>
          <tr>
            <td class="laporan-info" colspan="14">Total</td>
            <td class="laporan-info">Rp<?= number_format($data['total']['SUM(jumlah_bayar)'], 0, ',', '.'); ?></td>
            <td class="laporan-info">Rp<?= number_format($data['tagihan'] - $data['total']['SUM(jumlah_bayar)'], 0, ',', '.'); ?></td>
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