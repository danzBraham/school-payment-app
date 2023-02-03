<div class="container">
<table>
    <thead>
      <tr>
        <th>ID Kelas</th>
        <th>Kelas</th>
        <th>Jurusan</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['kelas'] as $kelas) : ?>
      <tr>
        <td><?= $kelas['id_kelas']; ?></td>
        <td><?= $kelas['kelas']; ?></td>
        <td><?= $kelas['jurusan']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>