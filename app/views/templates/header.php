<?php
  if (!isset($_SESSION['username'])) {
  header('Location' . BASEURL . '/home');
  exit;
  }
?>

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
      <li><a href="<?= BASEURL; ?>/dashboard">Dashboard</a></li>
      <li><a href="<?= BASEURL; ?>/siswa">Data Siswa</a></li>
      <li><a href="<?= BASEURL; ?>/kelas">Data Kelas</a></li>
      <li><a href="<?= BASEURL; ?>/spp">Data SPP</a></li>
      <li><a href="<?= BASEURL; ?>/pembayaran">Pembayaran</a></li>
      <li><a href="<?= BASEURL; ?>/histori">Histori</a></li>
      <li><a href="<?= BASEURL; ?>/logout">Logout</a></li>
    </ul>
  </nav>