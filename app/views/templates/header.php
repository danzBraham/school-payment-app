<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['title']; ?></title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/CSS/style.php">
  <script src="<?= BASEURL; ?>/JS/script.js"></script>
</head>

<body>
  <nav>
    <ul>
      <li><a href="<?= BASEURL; ?>">Dashboard</a></li>
      <li><a href="<?= BASEURL; ?>/siswa">Data Siswa</a></li>
      <li><a href="<?= BASEURL; ?>/pembayaran">Pembayaran</a></li>
    </ul>
  </nav>