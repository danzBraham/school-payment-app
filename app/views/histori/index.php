<div class="container">
  <div class="container-btn">
    <button class="laporan-btn laporan-kelas"><span class="button_top">Buat laporan Kelas</span></button>
    <button class="laporan-btn laporan-bulan"><span class="button_top">Buat laporan Bulan</span></button>
    <button class="laporan-btn laporan-siswa"><span class="button_top">Buat laporan Siswa</span></button>
  </div>

  <?php Flasher::flash(); ?>

  <table>
    <thead>
      <tr>
        <th>Petugas</th>
        <th>Nama Siswa</th>
        <th>Tanggal Bayar</th>
        <th>Bayar</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($data['histori'] != null) : ?>
      <?php foreach($data['histori'] as $h) : ?>
      <tr>
        <td><?= $h['username']; ?></td>
        <td><?= $h['nama']; ?></td>
        <td><?= $h['tgl_bayar']; ?></td>
        <td>Rp<?= number_format($h['bayar'], 0, ',', '.'); ?></td>
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

<div id="overlay" class="overlay">
  <form action="<?= BASEURL; ?>/histori" method="POST" id="modal" class="modal modal-kelas" autocomplete="off">
    <div id="close-btn" class="close-btn"><img src="<?= BASEURL; ?>/Assets/Icon/Close-Btn.svg"></div>
    <div class="input-box">
      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama" required>
    </div>
    <button type="submit">Tambah</button>
  </form>
</div>