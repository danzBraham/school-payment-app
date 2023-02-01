<div class="container">
  <table>
    <thead>
      <tr>
        <th>Petugas</th>
        <th>Nama Siswa</th>
        <th>Bulan</th>
        <th>Tanggal Bayar</th>
        <th>Bayar</th>
        <th>Tahun Ajaran</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($data['histori'] != null) : ?>
      <?php foreach($data['histori'] as $h) : ?>
      <tr>
        <td><?= $h['username']; ?></td>
        <td><?= $h['nama']; ?></td>
        <td><?= $h['bulan']; ?></td>
        <td><?= $h['tgl_bayar']; ?></td>
        <td>Rp<?= number_format($h['bayar'], 0, ',', '.'); ?></td>
        <td><?= $h['thn_ajaran']; ?></td>
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