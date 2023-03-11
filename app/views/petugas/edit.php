<div class="container form-edit">
  <div class="container-form">
    <a href="<?= BASEURL; ?>/petugas">
      <img src="<?= BASEURL; ?>/assets/icon/back.svg">
      <p>Kembali</p>
    </a>
    <form action="<?= BASEURL; ?>/petugas/update" method="POST" id="modal" class="modal click" autocomplete="off">
      <input type="hidden" name="id_petugas" value="<?= $data['petugas']['id_petugas']; ?>">
      <div class="input-box">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= $data['petugas']['username']; ?>" required>
      </div>
      <div class="input-box">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?= $data['petugas']['password']; ?>" required>
      </div>
      <div class="input-box">
        <label for="level">Level</label>
        <select name="level" required>
          <?php if ($data['petugas']['level'] == 'admin') : ?>
          <option selected value="admin">Admin</option>
          <option value="petugas">Petugas</option>
          <?php elseif ($data['petugas']['level'] == 'petugas') : ?>
          <option value="admin">Admin</option>
          <option selected value="petugas">Petugas</option>
          <?php endif; ?>
        </select>
      </div>
      <button type="submit">Perbarui</button>
    </form>
  </div>
</div>