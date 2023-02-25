<div class="container">
  <header>
    <h2>Data <span>Kelas</span></h2>
    <button id="add-btn" class="add-btn"><span class="button_top">Tambah Kelas</span></button>
  </header>

  <?php Flasher::flash(); ?>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th class="aksi">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($data['kelas'] as $kelas) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $kelas['kelas']; ?></td>
        <td><?= $kelas['jurusan']; ?></td>
        <td class="aksi">
          <a href="<?= BASEURL; ?>/kelas/edit/<?= $kelas['id_kelas']; ?>"><button class="edit-btn">Edit</button></a>
          <a href="<?= BASEURL; ?>/kelas/delete/<?= $kelas['id_kelas']; ?>"
            onclick="return confirm(`Anda yakin ingin menghapus <?= $kelas['kelas']; ?>?`)"><button
              class="delete-btn">Delete</button></a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div id="overlay" class="overlay">
  <form action="<?= BASEURL; ?>/kelas/add" method="POST" id="modal" class="modal" autocomplete="off">
    <div id="close-btn" class="close-btn"><img src="<?= BASEURL; ?>/Assets/Icon/close.svg"></div>
    <div class="input-box">
      <label for="kelas">Kelas</label>
      <input type="text" id="kelas" name="kelas" placeholder="Contoh: X-RPL-1" maxlength="8" required>
    </div>
    <div class="input-box">
      <label for="jurusan">Jurusan</label>
      <select name="jurusan" id="jurusan" required>
        <option selected value="">Pilih Jurusan</option>
        <option value="DKV">DKV</option>
        <option value="RPL">RPL</option>
        <option value="TKJ">TKJ</option>
      </select>
    </div>
    <button type="submit">Tambah</button>
  </form>
</div>