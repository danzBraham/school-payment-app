<div class="container">
  <form action="<?= BASEURL; ?>/home/siswa" method="POST" autocomplete="off">
    <input list="nis" name="nis" id="nis" placeholder="NIS Siswa" class="search">
    <datalist id="nis">
    <?php foreach($data['siswa'] as $s) : ?>
      <option value="<?= $s['nis']; ?>">
    <?php endforeach; ?>
    </datalist>
    <button type="submit">Cari</button>
  </form>

  <?php foreach($data['siswa'] as $s) : ?>
    <ul>
      <li>NIS: <?= $s['nis']; ?></li>
      <li>Nama: <?= $s['nama']; ?></li>
      <li>Jenis Kelamin: <?= $s['jk']; ?></li>
      <li>Kelas: <?= $s['kelas']; ?></li>
    </ul>
  <?php endforeach; ?>
</div>