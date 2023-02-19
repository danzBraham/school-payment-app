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
  <nav>
    <ul>
      <?php if (isset($_SESSION['level'])) : ?>
        <?php if ($_SESSION['level'] == 'admin') : ?>
        <li><a href="<?= BASEURL; ?>/dashboard">Dashboard</a></li>
        <li><a href="<?= BASEURL; ?>/siswa">Siswa</a></li>
        <li><a href="<?= BASEURL; ?>/kelas">Kelas</a></li>
        <li><a href="<?= BASEURL; ?>/petugas">Petugas</a></li>
        <li><a href="<?= BASEURL; ?>/spp">SPP</a></li>
        <li><a href="<?= BASEURL; ?>/pembayaran">Pembayaran</a></li>
        <li><a href="<?= BASEURL; ?>/histori">Histori</a></li>
        <li class="logout">
          <a href="<?= BASEURL; ?>/home/logout">
            Logout<img src="<?= BASEURL; ?>/Assets/Icon/logout.svg" alt="logout">
          </a>
        </li>
        <?php elseif ($_SESSION['level'] == 'petugas') : ?>
        <li><a href="<?= BASEURL; ?>/pembayaran">Pembayaran</a></li>
        <li><a href="<?= BASEURL; ?>/histori">Histori</a></li>
        <li class="logout">
          <a href="<?= BASEURL; ?>/home/logout">
            Logout<img src="<?= BASEURL; ?>/Assets/Icon/logout.svg" alt="logout">
          </a>
        </li>
        <?php endif; ?>
      <?php else : ?>
        <?php if (isset($_SESSION['nis'])) : ?>
        <li><a href="<?= BASEURL; ?>/histori">Histori</a></li>
        <li class="logout">
          <a href="<?= BASEURL; ?>/home/logout">
            Logout<img src="<?= BASEURL; ?>/Assets/Icon/logout.svg" alt="logout">
          </a>
        </li>
        <?php endif; ?>
      <?php endif; ?>
    </ul>
  </nav>