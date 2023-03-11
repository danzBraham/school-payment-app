<div class="container">
  <div class="hero">
    <div class="main-hero">
      <h1>Halo👋 <?= $_SESSION['username']; ?> <br> Selamat Datang di Dashboard</h1>
      <div class="wrapper-box">
        <div class="box-data">
          <div class="icon">
            <img src="<?= BASEURL; ?>/assets/icon/students.svg" alt="Students">
          </div>
          <span></span>
          <div class="info-total">
            <h3><?= $data['siswa']['COUNT(*)']; ?></h3>
            <p>Siswa</p>
          </div>
        </div>
        <div class="box-data">
          <div class="icon">
            <img src="<?= BASEURL; ?>/assets/icon/class.svg" alt="Students">
          </div>
          <span></span>
          <div class="info-total">
            <h3><?= $data['kelas']['COUNT(*)']; ?></h3>
            <p>Kelas</p>
          </div>
        </div>
        <div class="box-data">
          <div class="icon">
            <img src="<?= BASEURL; ?>/assets/icon/officer.svg" alt="Students">
          </div>
          <span></span>
          <div class="info-total">
            <h3><?= $data['petugas']['COUNT(*)']; ?></h3>
            <p>Petugas</p>
          </div>
        </div>
      </div>
    </div>
    <div class="img-hero">
      <img src="<?= BASEURL; ?>/assets/icon/hero-dashboard.svg" alt="Hero">
    </div>
  </div>

  <div class="transaksi-table">
    <p>Transaksi Terakhir</p>
    <table>
      <thead>
        <tr>
          <th>Petugas</th>
          <th>Nama Siswa</th>
          <th>Tanggal Bayar</th>
          <th>Bayar</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($data['transaksi'] != null) : ?>
        <?php foreach($data['transaksi'] as $transaksi) : ?>
        <tr>
          <td><?= $transaksi['username']; ?></td>
          <td><?= $transaksi['nama']; ?></td>
          <td><?= $transaksi['tgl_bayar']; ?></td>
          <td>Rp<?= number_format($transaksi['bayar'], 0, ',', '.'); ?></td>
        </tr>
        <?php endforeach; ?>
        <?php else : ?>
        <tr>
          <td colspan="6">
            <p class="no-data">Tidak Ada Data</p>
          </td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>