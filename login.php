<?php
include "conn.php";

$sql = "SELECT * FROM `film`
ORDER BY id_film ASC";
$cekfilm = mysqli_query($conn, $sql);

foreach ($cekfilm as $isi) {
  $id_film = $isi['id_film'];
  $tayang = $isi['tayang'];
  $berakhir = $isi['berakhir'];
  if (date("Y-m-d") < $tayang) {
    $status = "Akan Datang";
  } elseif (date("Y-m-d") > $berakhir) {
    $status = "Berakhir";
  } else {
    $status = "Berlangsung";
  }
  $sql = "UPDATE `film` SET `status_film` = '$status' WHERE `film`.`id_film` = $id_film;";
  $upt_film = mysqli_query($conn, $sql);
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="../assets/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="sign-in.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>

</style>

<body class="body-login">
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row rounded-4 p-4  bg-dark shadow box-area">
      <!-- Left Box Login -->
      <div class="col-md-6 d-flex justify-content-center align-item-center flex-columb left-box">
        <div class="featured-imag">
          <img src="assets/img/login.jpg" class="img-fluid" style="width: 100%; height: 100%;">
        </div>
      </div>

      <!-- Right Box Login -->
      <div class="col-md-6 right-box p-5">
        <div class="row align-item-center">
          <div class="header-text mb-2 text-center fs-3">
            <p>Silahkan Login</p>
          </div>
          <div class="">
            <?php
            if (isset($_GET['pesan'])) {
              if ($_GET['pesan'] == 'gagal') {
                echo "<div class='alert alert-danger text-center text-dark ' role='alert'>
                 Username Atau Password Salah
              </div>";
              } elseif ($_GET['pesan'] == 'logout') {
                echo "<div class='alert alert-info text-center text-dark' role='alert'>
              Anda Telah Berhasil Logout
             </div>";
              } else {
                echo "<div class='alert alert-info text-center text-dark' role='alert'>
              Anda Harus Login Terlebih Dahulu
             </div>";
              }
            }
            ?>
          </div>
          <form action="cek_login.php" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-lg bg-light fs-6" name="username" placeholder="Username" required>
            </div>

            <div class="input-group mb-3">
              <input type="password" class="form-control form-control-lg bg-ligth fs-6" name="password" placeholder="Password" required>
            </div>

            <div class="input-group mb-3 ">
              <button class="btn btn-lg btn-dark w-100 fs-6 border-light" name="login" type="submit">Login</button>
            </div>
          </form>

          <div class="row">
            <small>Tidak Punya Akun? <a href="registrasi.php">Daftar</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>

</html>