<div class="container">
  <form action="" method="get">
    <input type="text" list="nis" name="nis" id="nis" placeholder="Cari siswa berdasarkan nis...">
    <datalist id="nis">
    <?php foreach($data['siswa'] as $s) : ?>
      <option value="<?= $s['nis']; ?>">
    <?php endforeach; ?>
    </datalist>
    <input type="submit" value="cari">
  </form>

  <?php foreach($data['siswa'] as $s) : ?>
    <ul>
      <li>ID: <?= $s['nis']; ?></li>
      <li>Nama: <?= $s['nama']; ?></li>
      <li>Kelas: <?= $s['kelas']; ?></li>
      <li>Jenis Kelamin: <?= $s['jk']; ?></li>
    </ul>
  <?php endforeach; ?>
</div>