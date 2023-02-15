<div class="container form-edit">
  <div class="container-form">
    <a href="<?= BASEURL; ?>/kelas">
      <img src="<?= BASEURL; ?>/Assets/Icon/back.svg">
      <p>Kembali</p>
    </a>
    <form action="<?= BASEURL; ?>/kelas/update" method="POST" id="modal" class="modal click" autocomplete="off">
      <input type="hidden" name="id_kelas" value="<?= $data['satu-kelas']['id_kelas']; ?>">
      <div class="input-box">
        <label for="kelas">Kelas</label>
        <select name="kelas" required>
          <?php foreach ($data['kelas'] as $kelas) : ?>
          <?php if ($kelas['kelas'] == $data['satu-kelas']['kelas']) : ?>
          <option selected value="<?= $data['satu-kelas']['kelas']; ?>"><?= $data['satu-kelas']['kelas']; ?></option>
          <?php else : ?>
          <option value="<?= $kelas['kelas']; ?>"><?= $kelas['kelas']; ?></option>
          <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="input-box">
        <label for="jurusan">Jurusan</label>
        <select name="jurusan" required>
          <?php foreach ($data['jurusan'] as $jurusan) : ?>
          <?php if ($jurusan['jurusan'] == $data['satu-kelas']['jurusan']) : ?>
          <option selected value="<?= $data['satu-kelas']['jurusan']; ?>"><?= $data['satu-kelas']['jurusan']; ?>
          </option>
          <?php else : ?>
          <option value="<?= $jurusan['jurusan']; ?>"><?= $jurusan['jurusan']; ?></option>
          <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit">Edit</button>
    </form>
  </div>
</div>