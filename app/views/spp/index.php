<div class="container">
  <table>
    <thead>
      <tr>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Jumlah Bayar</th>
        <th>Tanggal Bayar</th>
        <th>Bulan</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($data['spp'] != 'undefined') : ?>
      <?php foreach($data['spp'] as $spp) : ?>
      <tr>
        <td><?= $spp['nis']; ?></td>
        <td><?= $spp['nama']; ?></td>
        <td>Rp<?= number_format($spp['jumlah_bayar'], 0, ',', '.'); ?></td>
        <td><?= $spp['tgl_bayar']; ?></td>
        <td><?= $spp['bulan']; ?></td>
        <td><?= $spp['keterangan'] ?></td>
      </tr>
      <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td colspan="6"><h2>Tidak Ada Data</h2></td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>