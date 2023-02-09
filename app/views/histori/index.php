<div class="container">
  <div class="container-btn">
    <button id="laporan-kelas-btn" class="laporan-btn"><span class="button_top">Buat laporan Kelas</span></button>
    <button id="laporan-bulan-btn" class="laporan-btn"><span class="button_top">Buat laporan Bulan</span></button>
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
  <form action="<?= BASEURL; ?>/histori/kelas" method="POST" id="modal-kelas" class="modal" autocomplete="off">
    <div id="close-btn" class="close-btn"><img src="<?= BASEURL; ?>/Assets/Icon/Close-Btn.svg"></div>
    <div class="input-box">
      <select name="angkatan" required>
        <option selected value="">Pilih Kelas</option>
        <?php foreach ($data['kelas'] as $kelas) : ?>
          <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['kelas'] . '-' . $kelas['jurusan']; ?></option>
        <?php endforeach; ?>
      </select>
      <select name="bulan" required>
        <option selected value="">Pilih Bulan</option>
        <?php foreach ($data['bulan'] as $bulan) : ?>
          <option value="<?= $bulan['bulan']; ?>"><?= $bulan['bulan']; ?></option>
        <?php endforeach; ?>
      </select>
      <select name="tahun" required>
        <option selected value="">Pilih Tahun</option>
        <?php foreach ($data['tahun'] as $tahun) : ?>
          <option value="<?= $tahun['tahun']; ?>"><?= $tahun['tahun']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit">Buat Laporan</button>
  </form>

  <form action="<?= BASEURL; ?>/histori" method="POST" id="modal-bulan" class="modal" autocomplete="off">
    <div id="close-btn" class="close-btn"><img src="<?= BASEURL; ?>/Assets/Icon/Close-Btn.svg"></div>
    <h1>Bulan</h1>
    <div class="input-box">
      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama" required>
    </div>
    <button type="submit">Tambah</button>
  </form>

  <form action="<?= BASEURL; ?>/histori" method="POST" id="modal-siswa" class="modal" autocomplete="off">
    <div id="close-btn" class="close-btn"><img src="<?= BASEURL; ?>/Assets/Icon/Close-Btn.svg"></div>
    <h1>Siswa</h1>
    <div class="input-box">
      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama" required>
    </div>
    <button type="submit">Tambah</button>
  </form>
</div>