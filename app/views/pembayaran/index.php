<div class="container">
  <form action="<?= BASEURL; ?>/pembayaran/siswa" method="POST" autocomplete="off" class="search-form">
    <input list="Allnis" name="nis" id="nis" placeholder="NIS Siswa" class="search">
    <datalist id="Allnis">
    <?php foreach($data['siswa'] as $s) : ?>
      <option value="<?= $s['nis']; ?>"><?= $s['nama']; ?></option>
    <?php endforeach; ?>
    </datalist>
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
        <label for="bulan">bulan</label>
        <select name="bulan">
          <?php $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']; ?>
          <?php foreach ($bulan as $b) : ?>
            <option value="<?= $b; ?>"><?= $b; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="input-box">
        <label for="tgl-bayar">Tanggal Bayar</label>
        <input type="text" id="tgl-bayar" value="<?= date('Y-m-d'); ?>" readonly>
      </div>
      <div class="input-box">
        <label for="nominal-bayar">Nominal Bayar</label>
        <input type="text" id="nominal-bayar" name="nominal-bayar" value="Rp<?= number_format($data['siswaByNis']['nominal'], 0, ',', '.'); ?>" readonly>
      </div>
      <div class="input-box">
        <label for="saldo">Saldo</label>
        <input type="text" id="saldo" name="saldo" value="Rp<?= number_format($data['siswaByNis']['saldo'], 0, ',', '.'); ?>" readonly>
      </div>
      <div class="input-box">
        <label for="jml-bayar">Jumlah Bayar</label>
        <input type="number" id="jml-bayar" name="jml-bayar" placeholder="Masukkan Jumlah Bayar">
      </div>
      <button type="submit">Bayar</button>
    </form>

    <div class="history-siswa">
      <table>
        <thead>
          <tr>
            <th>Bulan</th>
            <th>tgl-bayar</th>
            <th>jumlah-bayar</th>
            <th>keterangan</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['siswaHistory'] as $data) : ?>
          <tr>
            <td><?= $data['bulan']; ?></td>
            <td><?= ($data['tgl_bayar']) ? $data['tgl_bayar'] : '-'; ?></td>
            <td>Rp<?= number_format($data['jumlah_bayar'], 0, ',', '.'); ?></td>
            <td><?= ($data['keterangan']) ? $data['keterangan'] : 'Belum Lunas'; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php endif; ?>

</div>