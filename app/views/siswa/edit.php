<div class="container form-edit">
    <form action="<?= BASEURL; ?>/siswa/update" method="POST" id="modal" class="modal click" autocomplete="off">
      <input type="hidden" name="nis" value="<?= $data['siswa']['nis']; ?>">
      <div class="input-box">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" value="<?= $data['siswa']['nama']; ?>">
      </div>
      <div class="input-box">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?= $data['siswa']['password']; ?>">
      </div>
      <div class="input-box">
        <label for="kelas">Kelas</label>
        <select name="kelas">
          <?php foreach ($data['kelas'] as $kelas) : ?>
          <?php if ($kelas['kelas'] == $data['siswa']['kelas']) : ?>
            <option selected value="<?= $data['siswa']['id_kelas']; ?>"><?= $data['siswa']['kelas']; ?></option>
          <?php endif; ?>
          <?php if ($kelas['kelas'] != $data['siswa']['kelas']) : ?>
            <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['kelas']; ?></option>
          <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="input-box">
        <label for="telp">No Telp</label>
        <input type="text" id="telp" name="telp" value="<?= $data['siswa']['no_telp']; ?>">
      </div>
      <div class="input-box">
        <label for="alamat">alamat</label>
        <textarea rows="5" name="alamat"><?= $data['siswa']['alamat']; ?></textarea>
      </div>
      <button type="submit">Edit</button>
    </form>
</div>