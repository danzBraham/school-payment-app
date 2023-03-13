<div class="container">
  <header>
    <h2>Histori <span>Pembayaran</span></h2>
    <?php if(!isset($_SESSION['nis'])) : ?>
    <div class="container-btn">
      <button id="laporan-kelas-btn" class="laporan-btn"><span class="button_top">Buat laporan Kelas</span></button>
      <button id="laporan-siswa-btn" class="laporan-btn"><span class="button_top">Buat laporan Siswa</span></button>
    </div>
    <?php endif; ?>
  </header>

  <?php Flasher::flash(); ?>

  <div class="table-wrapper">
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

  <!-- Pagination links -->
  <div class="pagination">
    <?php if ($data['currentPage'] > 1) : ?>
    <a href="<?= BASEURL; ?>/histori/<?= $data['currentPage'] - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php if ((int) $data['totalPages'] !== 1) : ?>
      <?php for ($i = 1; $i <= $data['totalPages']; $i++) : ?>
        <?php if ($i == $data['currentPage']) : ?>
        <span><?= $i; ?></span>
        <?php else : ?>
        <a href="<?= BASEURL; ?>/histori/<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
      <?php endfor; ?>
    <?php endif; ?>

    <?php if ($data['currentPage'] < $data['totalPages']) : ?>
    <a href="<?= BASEURL; ?>/histori/<?= $data['currentPage'] + 1; ?>">&raquo;</a>
    <?php endif; ?>
  </div>
</div>

<!-- Modal -->
<div id="overlay" class="overlay">
  <form action="<?= BASEURL; ?>/histori/laporankelas" method="POST" id="modal-kelas" class="modal" autocomplete="off">
    <div class="close-btn"><img src="<?= BASEURL; ?>/assets/icon/close.svg"></div>
    <div class="input-box">
      <label for="kelas">Kelas</label>
      <select name="kelas" id="kelas" required>
        <option value="" selected>Pilih Kelas</option>
        <?php foreach ($data['kelas'] as $kelas) : ?>
        <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['kelas']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="input-box">
      <label for="tahun">Tahun Angkatan</label>
      <select name="tahun" id="tahun" required>
        <option value="" selected>Pilih Tahun Angkatan</option>
        <?php foreach ($data['tahun'] as $tahun) : ?>
        <option value="<?= $tahun['tahun_angkatan']; ?>"><?= $tahun['tahun_angkatan']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit">Buat Laporan Kelas</button>
  </form>

  <form action="<?= BASEURL; ?>/histori/laporansiswa" method="POST" id="modal-siswa" class="modal" autocomplete="off">
    <div class="close-btn"><img src="<?= BASEURL; ?>/assets/icon/close.svg"></div>
    <div class="input-box">
      <label for="siswa">Siswa</label>
      <input type="text" id="siswa" name="keyword" placeholder="Cari NIS atau Nama Lengkap Siswa" required>
    </div>
    <button type="submit">Buat Laporan Siswa</button>
  </form>
</div>