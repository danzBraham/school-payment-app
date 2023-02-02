<div class="container">
  <table>
    <thead>
      <tr>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Bulan</th>
        <th>Jumlah Bayar</th>
        <th>Total Tagihan</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($data['spp'] != null) : ?>
      <?php foreach($data['spp'] as $spp) : ?>
      <tr>
        <td><?= $spp['nis']; ?></td>
        <td><?= $spp['nama']; ?></td>
        <td><?= $spp['bulan']; ?></td>
        <td>Rp<?= number_format($spp['jumlah_bayar'], 0, ',', '.'); ?></td>
        <td>Rp<?= number_format($spp['total_tagihan'], 0, ',', '.'); ?></td>
      </tr>
      <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td colspan="6"><p class="no-data">Tidak Ada Data</p></td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>