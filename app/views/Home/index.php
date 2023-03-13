<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['title']; ?></title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/CSS/style.php">
</head>

<body>
  <?php Flasher::flashLogin(); ?>
  <div class="container-login">
    <div class="container-form-login">
      <div class="wrapper">
        <h1>Selamat <span>Datang</span></h1>
        <form action="<?= BASEURL; ?>/home/login" method="POST" autocomplete="off">
          <div class="input-box">
            <label for="username">Username / NIS</label>
            <input type="text" id="username" name="username" required>
          </div>
          <div class="input-box">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
          </div>
          <button type="submit">Login</button>
        </form>
      </div>
      <div class="img">
        <img src="<?= BASEURL; ?>/assets/icon/hero.svg" alt="Hero">
      </div>
    </div>
  </div>
</body>

</html>