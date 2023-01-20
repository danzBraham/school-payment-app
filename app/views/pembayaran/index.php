<div class="container">
  <form action="<?= BASEURL; ?>/pembayaran/siswa" method="POST" autocomplete="off">
    <input list="Allnis" name="nis" id="nis" placeholder="NIS Siswa" class="search">
    <datalist id="Allnis">
    <?php foreach($data['siswa'] as $s) : ?>
      <option value="<?= $s['nis']; ?>">
    <?php endforeach; ?>
    </datalist>
    <button type="submit">Cari</button>
  </form>

  <hr>

  <?php if (!isset($data['siswaByNis'])) : ?>
    <h1>Halo Bang</h1>
  <?php else : ?>
    <ul>
      <li><?= $data['siswaByNis']['nis']; ?></li>
      <li><?= $data['siswaByNis']['nama']; ?></li>
      <li><?= $data['siswaByNis']['password']; ?></li>
      <li><?= $data['siswaByNis']['alamat']; ?></li>
      <li><?= $data['siswaByNis']['no_telp']; ?></li>
      <li><?= $data['siswaByNis']['kelas']; ?></li>
    </ul>
  <?php endif; ?>

</div>