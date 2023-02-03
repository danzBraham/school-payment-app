<div class="container">
  <form action="<?= BASEURL; ?>/pembayaran/siswa" method="POST" autocomplete="off" class="search-form">
    <input list="Allnis" name="nis" id="nis" placeholder="NIS Siswa">
    <datalist id="Allnis">
      <?php foreach($data['siswa'] as $s) : ?>
      <option value="<?= $s['nis']; ?>"><?= $s['nama']; ?></option>
      <?php endforeach; ?>
    </datalist>
    <select name="tahun">
      <option selected>Pilih Tahun Ajaran</option>
      <option value="2023/2024">2023/2024</option>
      <option value="2024/2025">2024/2025</option>
      <option value="2025/2026">2025/2026</option>
    </select>
    <button type="submit">Cari</button>
  </form>

  <hr>

  <?php if (!isset($data['siswaByNis'])) : ?>
  <h1 class="info">Mohon Cari Siswa Berdasarkan NIS</h1>
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
        <label for="tahun-ajaran">Tahun Ajaran</label>
        <input type="text" name="tahun-ajaran" id="tahun-ajaran" value="<?= $data['siswaByNis']['thn_ajaran']; ?>" readonly>
      </div>
      <div class="input-box">
        <label for="nominal-bayar">Nominal Bayar</label>
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
            <th>Bulan</th>
            <th>Jumlah Bayar</th>
          </tr>
        </thead>
        <tbody>
          <?php $dataTagihan = $data['tagihan']; ?>
          <?php foreach ($data['siswaHistory'] as $data) : ?>
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