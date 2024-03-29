<div class="container">
  <header>
    <h2>Data <span>Petugas</span></h2>
    <button id="add-btn" class="add-btn"><span class="button_top">Tambah Petugas</span></button>
  </header>


  <?php Flasher::flash(); ?>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th class="aksi">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($data['petugas'] as $petugas) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $petugas['username']; ?></td>
        <td><?= $petugas['password']; ?></td>
        <td><?= $petugas['level']; ?></td>
        <td class="aksi">
          <a href="<?= BASEURL; ?>/petugas/edit/<?= $petugas['id_petugas']; ?>"><button
              class="edit-btn">Edit</button></a>
          <?php if ($_SESSION['id_petugas'] == $petugas['id_petugas']) : ?>
          <a href="<?= BASEURL; ?>/petugas/"><button disabled
              class="delete-btn disabled">Delete</button></a>
              <?php else : ?>
          <a href="<?= BASEURL; ?>/petugas/delete/<?= $petugas['id_petugas']; ?>"
            onclick="return confirm(`Anda yakin ingin menghapus <?= $petugas['username']; ?>?`)"><button
              class="delete-btn">Delete</button></a>
          <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div id="overlay" class="overlay">
  <form action="<?= BASEURL; ?>/petugas/add" method="POST" id="modal" class="modal" autocomplete="off">
    <div id="close-btn" class="close-btn"><img src="<?= BASEURL; ?>/assets/icon/close.svg"></div>
    <div class="input-box">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div class="input-box">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div class="input-box">
      <label for="level">Level</label>
      <select name="level" id="level" required>
        <option selected value="">Pilih Level</option>
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
      </select>
    </div>
    <button type="submit">Tambah</button>
  </form>
</div>