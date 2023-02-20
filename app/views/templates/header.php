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
    <div class="nav-main">
      <div class="logo">
        <img src="<?= BASEURL; ?>/Assets/Icon/logo.svg" alt="logo">
      </div>
      <ul>
        <?php if (isset($_SESSION['level'])) : ?>
        <?php if ($_SESSION['level'] == 'admin') : ?>
        <li>
          <a href="<?= BASEURL; ?>/dashboard">
            <img src="<?= BASEURL; ?>/Assets/Icon/dash-icon.svg" alt="dash-icon">
            Dashboard
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/siswa">
            <img src="<?= BASEURL; ?>/Assets/Icon/siswa-icon.svg" alt="dash-icon">
            Siswa
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/kelas">
            <img src="<?= BASEURL; ?>/Assets/Icon/kelas-icon.svg" alt="dash-icon">
            Kelas
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/petugas">
            <img src="<?= BASEURL; ?>/Assets/Icon/petugas-icon.svg" alt="dash-icon">
            Petugas
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/spp">
            <img src="<?= BASEURL; ?>/Assets/Icon/spp-icon.svg" alt="dash-icon">
            SPP
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/pembayaran">
            <img src="<?= BASEURL; ?>/Assets/Icon/pembayaran-icon.svg" alt="dash-icon">
            Pembayaran
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/histori">
            <img src="<?= BASEURL; ?>/Assets/Icon/histori-icon.svg" alt="dash-icon">
            Histori
          </a>
        </li>
        <?php elseif ($_SESSION['level'] == 'petugas') : ?>
        <li>
          <a href="<?= BASEURL; ?>/pembayaran">
            <img src="<?= BASEURL; ?>/Assets/Icon/pembayaran-icon.svg" alt="dash-icon">
            Pembayaran
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/histori">
            <img src="<?= BASEURL; ?>/Assets/Icon/histori-icon.svg" alt="dash-icon">
            Histori
          </a>
        </li>
        <?php endif; ?>
        <?php else : ?>
        <?php if (isset($_SESSION['nis'])) : ?>
        <li>
          <a href="<?= BASEURL; ?>/histori">
            <img src="<?= BASEURL; ?>/Assets/Icon/histori-icon.svg" alt="dash-icon">
            Histori
          </a>
        </li>
        <?php endif; ?>
        <?php endif; ?>
      </ul>
    </div>
    <div class="log">
      <a class="logout" href="<?= BASEURL; ?>/home/logout">
        <img src="<?= BASEURL; ?>/Assets/Icon/logout.svg" alt="logout">Logout
      </a>
    </div>
  </nav>