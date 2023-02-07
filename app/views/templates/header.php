<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['title']; ?></title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/CSS/style.php">
  <script src="<?= BASEURL; ?>/JS/script.php"></script>
</head>

<body>
  <nav class="print">
    <ul>
      <?php if ($_SESSION['username'] == 'admin') : ?>
        <li><a href="<?= BASEURL; ?>/dashboard">Dashboard</a></li>
        <li><a href="<?= BASEURL; ?>/siswa">Data Siswa</a></li>
        <li><a href="<?= BASEURL; ?>/kelas">Data Kelas</a></li>
        <li><a href="<?= BASEURL; ?>/spp">Data SPP</a></li>
        <li><a href="<?= BASEURL; ?>/pembayaran">Pembayaran</a></li>
        <li><a href="<?= BASEURL; ?>/histori">Histori</a></li>
        <li><a href="<?= BASEURL; ?>/home/logout">Logout</a></li>
      <?php elseif ($_SESSION['username'] == 'petugas') : ?>
        <li><a href="<?= BASEURL; ?>/pembayaran">Pembayaran</a></li>
        <li><a href="<?= BASEURL; ?>/histori">Histori</a></li>
        <li><a href="<?= BASEURL; ?>/home/logout">Logout</a></li>
      <?php elseif (isset($_SESSION['nis'])) : ?>
        <li><a href="<?= BASEURL; ?>/histori">Histori</a></li>
        <li><a href="<?= BASEURL; ?>/home/logout">Logout</a></li>
      <?php endif; ?>
    </ul>
  </nav>