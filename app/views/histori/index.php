<div class="container">
  <div class="container-btn">
    <button id="laporan-kelas-btn" class="laporan-btn"><span class="button_top">Buat laporan Kelas</span></button>
    <button id="laporan-siswa-btn" class="laporan-btn"><span class="button_top">Buat laporan Siswa</span></button>
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
      <?php if ($data['transaksi'] != null) : ?>
      <?php foreach($data['transaksi'] as $h) : ?>
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
  <form action="<?= BASEURL; ?>/histori/laporankelas" method="POST" id="modal-kelas" class="modal" autocomplete="off">
    <div class="close-btn"><img src="<?= BASEURL; ?>/Assets/Icon/close-Btn.svg"></div>
    <div class="input-box">
      <label for="kelas">Kelas</label>
      <select name="kelas" id="kelas" required>
        <option selected value="">Pilih Kelas</option>
        <?php foreach ($data['kelas'] as $kelas) : ?>
        <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['id_kelas']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="input-box">
      <label for="bulan">Bulan</label>
      <select name="bulan" id="bulan" required>
        <option selected value="">Pilih Bulan</option>
        <?php foreach ($data['bulan'] as $bulan) : ?>
        <option value="<?= $bulan['bulan']; ?>"><?= $bulan['bulan']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="input-box">
      <label for="tahun">Tahun</label>
      <select name="tahun" id="tahun" required>
        <option selected value="">Pilih Tahun</option>
        <?php foreach ($data['tahun'] as $tahun) : ?>
        <option value="<?= $tahun['tahun']; ?>"><?= $tahun['tahun']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit">Buat Laporan Kelas</button>
  </form>

  <form action="<?= BASEURL; ?>/histori" method="POST" id="modal-siswa" class="modal" autocomplete="off">
    <div class="close-btn"><img src="<?= BASEURL; ?>/Assets/Icon/close-Btn.svg"></div>
    <div class="input-box">
      <label for="siswa">Siswa</label>
      <input type="text" id="siswa" name="siswa" placeholder="Cari NIS Siswa" required>
    </div>
    <button type="submit">Buat Laporan Siswa</button>
  </form>
</div>