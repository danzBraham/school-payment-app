<div class="container">
  <header>
    <h2>Data <span>Siswa</span></h2>
    <button id="add-btn" class="add-btn"><span class="button_top">Tambah Siswa</span></button>
  </header>

  <?php Flasher::flash(); ?>

  <div class="table-wrapper">
    <table>
      <thead>
        <tr>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Password</th>
          <th>Alamat</th>
          <th>No Telp</th>
          <th>Kelas</th>
          <th class="aksi">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($data['siswa'] != null) : ?>
        <?php foreach($data['siswa'] as $siswa) : ?>
        <tr>
          <td><?= $siswa['nis']; ?></td>
          <td><?= $siswa['nama']; ?></td>
          <td><?= $siswa['password']; ?></td>
          <td><?= $siswa['alamat']; ?></td>
          <td><?= $siswa['no_telp']; ?></td>
          <td><?= $siswa['kelas'] ?></td>
          <td class="aksi">
            <a href="<?= BASEURL; ?>/siswa/edit/<?= $siswa['nis']; ?>"><button class="edit-btn">Edit</button></a>
            <a href="<?= BASEURL; ?>/siswa/delete/<?= $siswa['nis']; ?>"><button class="delete-btn">Delete</button></a>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
          <td colspan="7">
            <p class="no-data">Tidak Ada Data</p>
          </td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination links -->
  <div class="pagination">
    <?php if ($data['currentPage'] > 1) : ?>
    <a href="<?= BASEURL; ?>/siswa/<?= $data['currentPage'] - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php if ((int) $data['totalPages'] !== 1) : ?>
      <?php for ($i = 1; $i <= $data['totalPages']; $i++) : ?>
      <?php if ($i == $data['currentPage']) : ?>
      <span><?= $i; ?></span>
      <?php else : ?>
      <a href="<?= BASEURL; ?>/siswa/<?= $i; ?>"><?= $i; ?></a>
      <?php endif; ?>
      <?php endfor; ?>
    <?php endif; ?>

    <?php if ($data['currentPage'] < $data['totalPages']) : ?>
    <a href="<?= BASEURL; ?>/siswa/<?= $data['currentPage'] + 1; ?>">&raquo;</a>
    <?php endif; ?>
  </div>
</div>

<!-- Modal -->
<div id="overlay" class="overlay">
  <form action="<?= BASEURL; ?>/siswa/add" method="POST" id="modal" class="modal" autocomplete="off">
    <div id="close-btn" class="close-btn"><img src="<?= BASEURL; ?>/Assets/Icon/close.svg"></div>
    <div class="input-box">
      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>
    </div>
    <div class="input-box">
      <label for="kelas">Kelas</label>
      <select name="kelas" required>
        <option selected>Pilih Kelas</option>
        <?php foreach ($data['kelas'] as $kelas) : ?>
        <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['kelas']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="input-box">
      <label for="telp">No Telp</label>
      <input type="text" id="telp" name="telp" placeholder="Masukkan No Telp" required>
    </div>
    <div class="input-box">
      <label for="alamat">Alamat</label>
      <textarea rows="5" name="alamat" placeholder="Masukkan Alamat" required></textarea>
    </div>
    <button type="submit">Tambah</button>
  </form>
</div>