<div class="container">
<table>
    <thead>
      <tr>
        <th>ID Kelas</th>
        <th>Kelas</th>
        <th>Tahun Ajaran</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['kelas'] as $kelas) : ?>
      <tr>
        <td><?= $kelas['id_kelas']; ?></td>
        <td><?= $kelas['kelas']; ?></td>
        <td><?= $kelas['thn_ajaran']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>