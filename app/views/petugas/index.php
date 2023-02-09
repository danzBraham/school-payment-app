<div class="container">
  <table>
    <thead>
      <tr>
        <th>ID Petugas</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['petugas'] as $petugas) : ?>
      <tr>
        <td><?= $petugas['id_petugas']; ?></td>
        <td><?= $petugas['username']; ?></td>
        <td><?= $petugas['password']; ?></td>
        <td><?= $petugas['level']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>