<div class="container form-edit">
  <div class="container-form">
    <a href="<?= BASEURL; ?>/siswa">
      <img src="<?= BASEURL; ?>/Assets/Icon/back.svg">
      <p>Kembali</p>
    </a>
    <form action="<?= BASEURL; ?>/siswa/update" method="POST" id="modal" class="modal click" autocomplete="off">
      <input type="hidden" name="nis" value="<?= $data['siswa']['nis']; ?>">
      <div class="input-box">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" value="<?= $data['siswa']['nama']; ?>" required>
      </div>
      <!-- <div class="input-box">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?= $data['siswa']['password']; ?>" required>
      </div> -->
      <div class="input-box">
        <label for="kelas">Kelas</label>
        <select name="kelas" required>
          <?php foreach ($data['kelas'] as $kelas) : ?>
          <?php if ($kelas['id_kelas'] == $data['siswa']['id_kelas']) : ?>
          <option selected value="<?= $data['siswa']['id_kelas']; ?>"><?= $data['siswa']['id_kelas']; ?></option>
          <?php else : ?>
          <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['id_kelas']; ?></option>
          <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="input-box">
        <label for="telp">No Telp</label>
        <input type="text" id="telp" name="telp" value="<?= $data['siswa']['no_telp']; ?>" required>
      </div>
      <div class="input-box">
        <label for="alamat">Alamat</label>
        <textarea rows="5" name="alamat" required><?= $data['siswa']['alamat']; ?></textarea>
      </div>
      <button type="submit">Edit</button>
    </form>
  </div>
</div>