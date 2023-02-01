<div class="container">
  <!-- <span class="add-btn"><a href="#add-form"><button>Tambah Siswa</button></a></span> -->
  <button id="add-btn" class="add-btn">Tambah Siswa</button>

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
      <?php foreach($data['siswa'] as $siswa) : ?>
      <tr>
        <td><?= $siswa['nis']; ?></td>
        <td><?= $siswa['nama']; ?></td>
        <td><?= $siswa['password']; ?></td>
        <td><?= $siswa['alamat']; ?></td>
        <td><?= $siswa['no_telp']; ?></td>
        <td><?= $siswa['kelas'] ?></td>
        <td class="aksi">
          <a href="<?= BASEURL; ?>/siswa/edit"><button class="edit-btn">Edit</button></a>
          <a href=""><button class="delete-btn">Delete</button></a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<div id="overlay" class="overlay">
  <!-- Tambah -->
  <form action="<?= BASEURL; ?>/siswa/tambah" method="POST" id="modal-add" class="modal modal-add" autocomplete="off">
    <div class="close-btn"><img src="<?= BASEURL; ?>/Assets/Icon/Close-Btn.svg" alt=""></div>
    <div class="input-box">
      <label for="nis">NIS</label>
      <input type="number" id="nis" name="nis">
    </div>
    <div class="input-box">
      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama">
    </div>
    <div class="input-box">
      <label for="password">Password</label>
      <input type="password" id="password" name="password">
    </div>
    <div class="input-box">
      <label for="kelas">Kelas</label>
      <select name="kelas">
        <option selected>Pilih Kelas</option>
        <?php foreach ($data['kelas'] as $kelas) : ?>
        <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['kelas']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="input-box">
      <label for="telp">No Telp</label>
      <input type="text" id="telp" name="telp">
    </div>
    <div class="input-box">
      <label for="alamat">alamat</label>
      <textarea rows="5" name="alamat"></textarea>
    </div>
    <button type="submit">Tambah</button>
  </form>
</div>