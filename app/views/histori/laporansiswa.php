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
    <h1>Laporan SPP Siswa</h1>
    <div class="laporan">
      <div class="laporan-info">
        <p>Nama: <?= $data['siswa']['nama']; ?></p>
        <p>Kelas: <?= $data['siswa']['kelas']; ?></p>
        <p>Tahun Masuk: <?= $data['siswa']['tahun_angkatan']; ?></p>
      </div>
      <table>
        <thead>
          <tr>
            <th>Angkatan</th>
            <?php foreach ($data['bulan'] as $bulan) : ?>
            <th><?= $bulan['bulan']; ?></th>
            <?php endforeach; ?>
            <th>Terbayar</th>
            <th>Tagihan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>X</th>
            <?php foreach ($data['laporan'] as $laporan) : ?>
              <?php if ($laporan['angkatan'] == 'X') : ?>
              <td>Rp<?= number_format($laporan['jumlah_bayar'], 0, ',',' .'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach ($data['terbayar'] as $terbayar) : ?>
              <?php if ($terbayar['angkatan'] == 'X') : ?>
              <td>Rp<?= number_format($terbayar['SUM(jumlah_bayar)'], 0, ',',' .'); ?></td>
              <td>Rp<?= number_format(6000000 - $terbayar['SUM(jumlah_bayar)'], 0, ',',' .'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
          </tr>
          <tr>
            <th>XI</th>
            <?php foreach ($data['laporan'] as $laporan) : ?>
              <?php if ($laporan['angkatan'] == 'XI') : ?>
                <td>Rp<?= number_format($laporan['jumlah_bayar'], 0, ',',' .'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach ($data['terbayar'] as $terbayar) : ?>
              <?php if ($terbayar['angkatan'] == 'XI') : ?>
              <td>Rp<?= number_format($terbayar['SUM(jumlah_bayar)'], 0, ',',' .'); ?></td>
              <td>Rp<?= number_format(6000000 - $terbayar['SUM(jumlah_bayar)'], 0, ',',' .'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
          </tr>
          <tr>
            <th>XII</th>
            <?php foreach ($data['laporan'] as $laporan) : ?>
              <?php if ($laporan['angkatan'] == 'XII') : ?>
                <td>Rp<?= number_format($laporan['jumlah_bayar'], 0, ',',' .'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach ($data['terbayar'] as $terbayar) : ?>
              <?php if ($terbayar['angkatan'] == 'XII') : ?>
              <td>Rp<?= number_format($terbayar['SUM(jumlah_bayar)'], 0, ',',' .'); ?></td>
              <td>Rp<?= number_format(6000000 - $terbayar['SUM(jumlah_bayar)'], 0, ',',' .'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
          </tr>
          <tr>
            <th colspan="13">Total</th>
            <td class="laporan-info">Rp<?= number_format($data['total'], 0, ',', '.'); ?></td>
            <td class="laporan-info">Rp<?= number_format($data['tagihan'] - $data['total'], 0, ',', '.'); ?></td>
          </tr>
        </tbody>
      </table>
      <div class="footer">
        <div class="catatan">
          <p>Note:</p>
          <p>Jika Rp0 maka belum dibayar</p>
          <p>Jika bukan Rp0 maka sudah terbayar sebanyak jumlah yang tertera</p>
        </div>
        <div class="tertanda">
          <p>Denpasar, <?= date('d-m-Y'); ?></p>
          <p>Prof. Dr. M. Helmi Firmansyah, M.Kom</p>
        </div>
        <div class="layer"></div>
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