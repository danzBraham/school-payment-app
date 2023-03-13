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
    <h1>Laporan SPP Kelas</h1>
    <div class="laporan">
      <div class="laporan-info">
        <p>Kelas: <?= $data['kelas']['kelas']; ?></p>
        <p>Tahun Masuk: <?= $data['tahun']['tahun_angkatan']; ?></p>
      </div>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Angkatan</th>
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
            <?php if ($i % 7 === 1 && $i !== 1) : ?>
              <div class="page-break">Hello</div>
            <?php endif; ?>
          <tr>
            <td rowspan="3"><?= $i++; ?></td>
            <td rowspan="3"><?= $siswa['nama']; ?></td>
            <td>X</td>
            <?php foreach ($data['laporan'] as $laporan) : ?>
              <?php if ($siswa['nama'] == $laporan['nama'] && $laporan['angkatan'] == 'X') : ?>
              <td>Rp<?= number_format($laporan['jumlah_bayar'], 0, ',', '.'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach ($data['terbayar'] as $terbayar) : ?>
              <?php if ($siswa['nama'] == $terbayar['nama'] && $terbayar['angkatan'] == 'X') : ?>
              <td class="laporan-info">Rp<?= number_format($terbayar['SUM(jumlah_bayar)'], 0, ',', '.'); ?></td>
              <td class="laporan-info">Rp<?= number_format(6000000 - $terbayar['SUM(jumlah_bayar)'], 0, ',', '.'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
          </tr>
          <tr>
            <td>XI</td>
            <?php foreach ($data['laporan'] as $laporan) : ?>
              <?php if ($siswa['nama'] == $laporan['nama'] && $laporan['angkatan'] == 'XI') : ?>
              <td>Rp<?= number_format($laporan['jumlah_bayar'], 0, ',', '.'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach ($data['terbayar'] as $terbayar) : ?>
              <?php if ($siswa['nama'] == $terbayar['nama'] && $terbayar['angkatan'] == 'XI') : ?>
              <td class="laporan-info">Rp<?= number_format($terbayar['SUM(jumlah_bayar)'], 0, ',', '.'); ?></td>
              <td class="laporan-info">Rp<?= number_format(6000000 - $terbayar['SUM(jumlah_bayar)'], 0, ',', '.'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
          </tr>
          <tr>
            <td>XII</td>
            <?php foreach ($data['laporan'] as $laporan) : ?>
              <?php if ($siswa['nama'] == $laporan['nama'] && $laporan['angkatan'] == 'XII') : ?>
              <td>Rp<?= number_format($laporan['jumlah_bayar'], 0, ',', '.'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach ($data['terbayar'] as $terbayar) : ?>
              <?php if ($siswa['nama'] == $terbayar['nama'] && $terbayar['angkatan'] == 'XII') : ?>
              <td class="laporan-info">Rp<?= number_format($terbayar['SUM(jumlah_bayar)'], 0, ',', '.'); ?></td>
              <td class="laporan-info">Rp<?= number_format(6000000 - $terbayar['SUM(jumlah_bayar)'], 0, ',', '.'); ?></td>
              <?php elseif(!$terbayar) : ?>
                <td class="laporan-info">Rp<?= number_format(0, 0, ',', '.'); ?></td>
                <td class="laporan-info">Rp<?= number_format(0, 0, ',', '.'); ?></td>
              <?php endif; ?>
            <?php endforeach; ?>
          </tr>
          <?php endforeach; ?>
          <tr>
            <th colspan="15">Total</th>
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
          <p>Zidan Abraham</p>
        </div>
        <div class="layer"></div>
      </div>
    </div>
  </div>

  <script>
    // document.addEventListener("DOMContentLoaded", function () {
    //   window.print();
    //   window.onafterprint = () => history.back();
    // });
  </script>
</body>


</html>