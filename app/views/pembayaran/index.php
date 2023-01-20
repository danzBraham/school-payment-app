<div class="container">
  <form action="<?= BASEURL; ?>/home/siswa" method="POST" autocomplete="off">
    <input list="Allnis" name="nis" id="nis" placeholder="NIS Siswa" class="search">
    <datalist id="Allnis">
    <?php foreach($data['siswa'] as $s) : ?>
      <option value="<?= $s['nis']; ?>">
    <?php endforeach; ?>
    </datalist>
    <button type="submit">Cari</button>
  </form>

  <hr>

  <h2>Cari Siswa Berdasarkan NIS</h2>

</div>