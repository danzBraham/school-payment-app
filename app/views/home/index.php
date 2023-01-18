<?php foreach($data['siswa'] as $s) : ?>
  <ul>
    <li>ID: <?= $s['id']; ?></li>
    <li>Nama: <?= $s['nama']; ?></li>
    <li>Jenis Kelamin: <?= $s['jk']; ?></li>
    <li>Kelas: <?= $s['kelas']; ?></li>
  </ul>
<?php endforeach; ?>