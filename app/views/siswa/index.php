<div class="container">
<?php foreach($data['siswa'] as $s) : ?>
    <ul>
      <li>NIS: <?= $s['nis']; ?></li>
      <li>Nama: <?= $s['nama']; ?></li>
      <li>Jenis Kelamin: <?= $s['jk']; ?></li>
      <li>Kelas: <?= $s['kelas']; ?></li>
    </ul>
  <?php endforeach; ?>
</div>