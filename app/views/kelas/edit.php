<div class="container form-edit">
  <div class="container-form">
    <a href="<?= BASEURL; ?>/kelas">
      <img src="<?= BASEURL; ?>/Assets/Icon/back.svg">
      <p>Kembali</p>
    </a>
    <form action="<?= BASEURL; ?>/kelas/update" method="POST" id="modal" class="modal click" autocomplete="off">
      <input type="hidden" name="id_kelas" value="<?= $data['kelasById']['id_kelas']; ?>">
      <div class="input-box">
        <label for="kelas">Kelas</label>
        <input type="text" id="kelas" name="kelas" value="<?= $data['kelasById']['kelas']; ?>"
          placeholder="Contoh: X-RPL-1" maxlength="8" required>
      </div>
      <div class="input-box">
        <label for="jurusan">Jurusan</label>
        <select name="jurusan" required>
          <?php foreach ($data['jurusan'] as $jurusan) : ?>
          <?php if ($jurusan['jurusan'] == $data['kelasById']['jurusan']) : ?>
          <option selected value="<?= $data['kelasById']['jurusan']; ?>"><?= $data['kelasById']['jurusan']; ?>
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