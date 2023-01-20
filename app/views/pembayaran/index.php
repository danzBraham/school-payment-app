<div class="container">
  <form action="<?= BASEURL; ?>/pembayaran/siswa" method="POST" autocomplete="off">
    <input list="Allnis" name="nis" id="nis" placeholder="NIS Siswa" class="search">
    <datalist id="Allnis">
    <?php foreach($data['siswa'] as $s) : ?>
      <option value="<?= $s['nis']; ?>">
    <?php endforeach; ?>
    </datalist>
    <button type="submit">Cari</button>
  </form>

  <hr>

  <?php if (!isset($data['siswaByNis'])) : ?>
    <h1 class="info">Mohon Cari Siswa Berdasarkan NIS</h1>
  <?php else : ?>
    <form action="">
      <table>
        <tr>
          <td><label for="nis">NIS</label></td>
          <td>:</td>
          <td><input type="text" name="nis" id="nis" readonly value="<?= $data['siswaByNis']['nis']; ?>"></td>
        </tr>
        <tr>
          <td><label for="nama">Nama</label></td>
          <td>:</td>
          <td><input type="text" name="nama" id="nama" readonly value="<?= $data['siswaByNis']['nama']; ?>"></td>
        </tr>
        <tr>
          <td><label for="alamat">Alamat</label></td>
          <td>:</td>
          <td><input type="text" name="alamat" id="alamat" readonly value="<?= $data['siswaByNis']['alamat']; ?>"></td>
        </tr>
        <tr>
          <td><label for="telp">No Telp</label></td>
          <td>:</td>
          <td><input type="text" name="telp" id="telp" readonly value="<?= $data['siswaByNis']['no_telp']; ?>"></td>
        </tr>
        <tr>
          <td><label for="kelas">Kelas</label></td>
          <td>:</td>
          <td><input type="text" name="kelas" id="kelas" readonly value="<?= $data['siswaByNis']['kelas']; ?>"></td>
        </tr>
      </table>
    </form>
  <?php endif; ?>

</div>