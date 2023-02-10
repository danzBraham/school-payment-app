<div class="container">
  <button id="add-btn" class="add-btn"><span class="button_top">Tambah Kelas</span></button>
  <?php Flasher::flash(); ?>

  <table>
    <thead>
      <tr>
        <th>ID Kelas</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th class="aksi">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['kelas'] as $kelas) : ?>
      <tr>
        <td><?= $kelas['id_kelas']; ?></td>
        <td><?= $kelas['kelas']; ?></td>
        <td><?= $kelas['jurusan']; ?></td>
        <td class="aksi">
          <a href="<?= BASEURL; ?>/kelas/edit/<?= $kelas['id_kelas']; ?>"><button class="edit-btn">Edit</button></a>
          <a href="<?= BASEURL; ?>/kelas/delete/<?= $kelas['id_kelas']; ?>"><button class="delete-btn">Delete</button></a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div id="overlay" class="overlay">
  <form action="<?= BASEURL; ?>/kelas/add" method="POST" id="modal" class="modal" autocomplete="off">
    <div id="close-btn" class="close-btn"><img src="<?= BASEURL; ?>/Assets/Icon/Close-Btn.svg"></div>
    <div class="input-box">
      <label for="id_kelas">ID Kelas</label>
      <input type="text" id="id_kelas" name="id_kelas" required>
    </div>
    <div class="input-box">
      <label for="kelas">Kelas</label>
      <input type="text" id="kelas" name="kelas" required>
    </div>
    <div class="input-box">
      <label for="jurusan">Jurusan</label>
      <input type="text" id="jurusan" name="jurusan" required>
    </div>
    <button type="submit">Tambah</button>
  </form>
</div>