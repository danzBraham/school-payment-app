<div class="container">
  <table>
    <thead>
      <tr>
        <th>ID Petugas</th>
        <th>ID SPP</th>
        <th>Tanggal Bayar</th>
        <th>Bayar</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($data['histori'] != null) : ?>
      <?php foreach($data['histori'] as $h) : ?>
      <tr>
        <td><?= $h['id_petugas']; ?></td>
        <td><?= $h['id_spp']; ?></td>
        <td><?= $h['tgl_bayar']; ?></td>
        <td>Rp<?= number_format($h['bayar'], 0, ',', '.'); ?></td>
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