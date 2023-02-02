<div class="container">
  <button id="add-btn" class="add-btn">Tambah Siswa</button>
  
  <?php Flasher::flash(); ?>

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
        <td><?= $siswa['kelas'] ?>-<?= $siswa['jurusan'] ?></td>
        <td class="aksi">
          <a href="<?= BASEURL; ?>/siswa/edit/<?= $siswa['nis']; ?>"><button class="edit-btn">Edit</button></a>
          <a href="<?= BASEURL; ?>/siswa/delete/<?= $siswa['nis']; ?>"><button class="delete-btn">Delete</button></a>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php else: ?>
      <tr>
        <td colspan="7"><p class="no-data">Tidak Ada Data</p></td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div id="overlay" class="overlay">
  <form action="<?= BASEURL; ?>/siswa/tambah" method="POST" id="modal" class="modal" autocomplete="off">
    <div id="close-btn" class="close-btn"><img src="<?= BASEURL; ?>/Assets/Icon/Close-Btn.svg"></div>
    <div class="input-box">
      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama">
    </div>
    <div class="input-box">
      <label for="password">Password</label>
      <input type="password" id="password" name="password">
    </div>
    <!-- Cara 1 -->
    <div class="input-box">
      <label for="thn-ajaran">Tahun Ajaran</label>
      <?php $tahun = date('Y'); ?>
      <?php $tahunDepan = $tahun + 1; ?>
      <?php $tahunAjaran = "$tahun/$tahunDepan"; ?>
      <input type="thn-ajaran" id="thn-ajaran" name="thn-ajaran" value="<?= $tahunAjaran; ?>" readonly>
    </div>
    <!-- Cara 2 -->
    <!-- <div class="input-box">
      <label for="thn-ajaran">Tahun Ajaran</label>
      <select name="thn-ajaran">
        <option selected>Pilih Tahun Ajaran</option>
        <option value="2022/2023">2022/2023</option>
        <option value="2023/2024">2023/2024</option>
        <option value="2024/2025">2024/2025</option>
      </select>
    </div> -->
    <div class="input-box">
      <label for="kelas">Kelas</label>
      <select name="kelas">
        <option selected>Pilih Kelas</option>
        <?php foreach ($data['kelas'] as $kelas) : ?>
        <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['kelas']; ?>-<?= $kelas['jurusan']; ?></option>
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