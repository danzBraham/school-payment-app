<div class="container">
  <form action="<?= BASEURL; ?>/pembayaran/siswa" method="POST" autocomplete="off" class="search-form">
    <?php if (!isset($data['siswaByNis'])) : ?>
    <input type="text" name="keyword" placeholder="NIS atau Nama Siswa" required>
    <select name="angkatan" required>
      <option value="" selected>Pilih Angkatan</option>
      <option value="X">X</option>
      <option value="XI">XI</option>
      <option value="XII">XII</option>
    </select>
    <?php else : ?>
    <input type="text" name="keyword" value="<?= $data['siswaByNis']['nama']; ?>" placeholder="NIS atau Nama Siswa" required>
    <select name="angkatan" required>
      <?php if ($data['siswaByNis']['angkatan'] === 'X') : ?>
      <option value="">Pilih Angkatan</option>
      <option value="X" selected>X</option>
      <option value="XI">XI</option>
      <option value="XII">XII</option>
      <?php elseif ($data['siswaByNis']['angkatan'] === 'XI') : ?>
      <option value="">Pilih Angkatan</option>
      <option value="X">X</option>
      <option value="XI" selected>XI</option>
      <option value="XII">XII</option>
      <?php elseif ($data['siswaByNis']['angkatan'] === 'XII') : ?>
      <option value="">Pilih Angkatan</option>
      <option value="X">X</option>
      <option value="XI">XI</option>
      <option value="XII" selected>XII</option>
      <?php endif; ?>
    </select>
    <?php endif; ?>
    <button type="submit" class="search">
      <img src="<?= BASEURL; ?>/assets/icon/search.svg" alt="">
    </button>
  </form>

  <?php Flasher::flash(); ?>
  <hr>

  <?php if (!isset($data['siswaByNis'])) : ?>
  <h1 class="info">-- Mohon Cari Siswa Berdasarkan NIS --</h1>
  <?php else : ?>
  <div class="container-pembayaran">
    <form action="<?= BASEURL; ?>/pembayaran/bayar" method="POST" autocomplete="off">
      <div class="input-box">
        <label for="nis">NIS</label>
        <input type="number" id="nis" name="nis" value="<?= $data['siswaByNis']['nis']; ?>" readonly>
      </div>
      <div class="input-box">
        <label for="nama">Nama</label>
        <input type="text" id="nama" value="<?= $data['siswaByNis']['nama']; ?>" readonly>
      </div>
      <div class="input-box">
        <label for="angkatan">Angkatan</label>
        <input type="text" name="angkatan" id="angkatan" value="<?= $data['siswaByNis']['angkatan']; ?>" readonly>
      </div>
      <div class="input-box">
        <label for="nominal-bayar">Nominal Bayar Perbulan</label>
        <input type="text" id="nominal-bayar" value="Rp500.000" readonly>
      </div>
      <div class="input-box">
        <label for="jml-bayar">Jumlah Bayar</label>
        <input type="number" id="jml-bayar" name="jml-bayar" placeholder="Masukkan Jumlah Bayar">
      </div>
      <button type="submit" onclick="return confirm('Apakah Jumlah Bayar Sudah Benar?')">Bayar</button>
    </form>

    <div class="history-siswa">
      <table>
        <thead>
          <tr>
            <th class="pembayaran">Bulan</th>
            <th class="pembayaran">Jumlah Bayar</th>
          </tr>
        </thead>
        <tbody>
          <?php $dataTagihan = $data['tagihan']; ?>
          <?php foreach ($data['siswaHistori'] as $data) : ?>
          <tr>
            <td><?= $data['bulan']; ?></td>
            <td>Rp<?= number_format($data['jumlah_bayar'], 0, ',', '.'); ?></td>
          </tr>
          <?php endforeach; ?>
          <tr>
            <td class="total">Sisa Tagihan</td>
            <td class="total-tagihan">Rp<?= number_format($dataTagihan, 0, ',', '.'); ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <?php endif; ?>

</div>