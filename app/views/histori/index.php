<div class="container">
<header>
    <h2>Histori Pembayaran</h2>
    <div class="container-btn">
      <button id="laporan-kelas-btn" class="laporan-btn"><span class="button_top">Buat laporan Kelas</span></button>
      <button id="laporan-siswa-btn" class="laporan-btn"><span class="button_top">Buat laporan Siswa</span></button>
    </div>
  </header>

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

  <!-- Pagination links -->
  <div class="pagination">
    <?php if ($data['currentPage'] > 1) : ?>
      <a href="<?= BASEURL; ?>/histori/<?= $data['currentPage'] - 1; ?>">Previous</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $data['totalPages']; $i++) : ?>
      <?php if ($i == $data['currentPage']) : ?>
        <span><?= $i; ?></span>
      <?php else : ?>
        <a href="<?= BASEURL; ?>/histori/<?= $i; ?>"><?= $i; ?></a>
      <?php endif; ?>
    <?php endfor; ?>

    <?php if ($data['currentPage'] < $data['totalPages']) : ?>
      <a href="<?= BASEURL; ?>/histori/<?= $data['currentPage'] + 1; ?>">Next</a>
    <?php endif; ?>
  </div>
</div>

<!-- Modal -->
<div id="overlay" class="overlay">
  <form action="<?= BASEURL; ?>/histori/laporankelas" method="POST" id="modal-kelas" class="modal" autocomplete="off">
    <div class="close-btn"><img src="<?= BASEURL; ?>/Assets/Icon/close.svg"></div>
    <div class="input-box">
      <label for="kelas">Kelas</label>
      <select name="kelas" id="kelas" required>
        <option selected value="">Pilih Kelas</option>
        <?php foreach ($data['kelas'] as $kelas) : ?>
        <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['id_kelas']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit">Buat Laporan Kelas</button>
  </form>

  <form action="<?= BASEURL; ?>/histori/laporansiswa" method="POST" id="modal-siswa" class="modal" autocomplete="off">
    <div class="close-btn"><img src="<?= BASEURL; ?>/Assets/Icon/close.svg"></div>
    <div class="input-box">
      <label for="siswa">Siswa</label>
      <input type="text" id="siswa" name="keyword" placeholder="Cari NIS atau Nama Lengkap Siswa" required>
    </div>
    <button type="submit">Buat Laporan Siswa</button>
  </form>
</div>