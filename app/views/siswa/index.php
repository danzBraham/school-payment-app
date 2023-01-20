<div class="container">
  <table>
    <thead>
      <tr>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Password</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th>Kelas</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($data['siswa'] as $siswa) : ?>
      <tr>
        <td><?= $siswa['nis']; ?></td>
        <td><?= $siswa['nama']; ?></td>
        <td><?= $siswa['password']; ?></td>
        <td><?= $siswa['alamat']; ?></td>
        <td><?= $siswa['no_telp']; ?></td>
        <td><?= $siswa['kelas'] ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>