<div class="container">
  <header>
    <h2>Data <span>SPP</span></h2>
  </header>

  <div class="table-wrapper">
    <table>
      <thead>
        <tr>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Bulan</th>
          <th>Angkatan</th>
          <th>Jumlah Bayar</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($data['spp'] != null) : ?>
        <?php foreach($data['spp'] as $spp) : ?>
        <tr>
          <td><?= $spp['nis']; ?></td>
          <td><?= $spp['nama']; ?></td>
          <td><?= $spp['bulan']; ?></td>
          <td><?= $spp['angkatan']; ?></td>
          <td>Rp<?= number_format($spp['jumlah_bayar'], 0, ',', '.'); ?></td>
        </tr>
        <?php endforeach; ?>
        <?php else : ?>
        <tr>
          <td colspan="6">
            <p class="no-data">Tidak Ada Data</p>
          </td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination links -->
  <div class="pagination">
    <?php if ($data['currentPage'] > 1) : ?>
    <a href="<?= BASEURL; ?>/spp/<?= $data['currentPage'] - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php if ((int) $data['totalPages'] !== 1) : ?>
      <?php for ($i = 1; $i <= $data['totalPages']; $i++) : ?>
      <?php if ($i == $data['currentPage']) : ?>
      <span><?= $i; ?></span>
      <?php else : ?>
      <a href="<?= BASEURL; ?>/spp/<?= $i; ?>"><?= $i; ?></a>
      <?php endif; ?>
      <?php endfor; ?>
    <?php endif; ?>

    <?php if ($data['currentPage'] < $data['totalPages']) : ?>
    <a href="<?= BASEURL; ?>/spp/<?= $data['currentPage'] + 1; ?>">&raquo;</a>
    <?php endif; ?>
  </div>
</div>