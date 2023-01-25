<div class="container">
  <table>
    <thead>
      <tr>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Tanggal Bayar</th>
        <th>Jumlah Bayar</th>
        <th>Sisa Tagihan</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($data['spp'] != null) : ?>
      <?php foreach($data['spp'] as $spp) : ?>
      <tr>
        <td><?= $spp['nis']; ?></td>
        <td><?= $spp['nama']; ?></td>
        <td><?= $spp['bulan']; ?></td>
        <td><?= $spp['tgl_bayar']; ?></td>
        <td>Rp<?= number_format($spp['jumlah_bayar'], 0, ',', '.'); ?></td>
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