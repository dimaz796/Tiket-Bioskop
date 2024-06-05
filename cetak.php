<?php
include "navbar.php";
if ($_SESSION['id_role'] != 3) {
    echo "
         <script>
			window.location.href='login.php?pesan=kemana';
		</script>";
    die;
} ?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="./assets/css/style.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



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
                        <p>Masukan Kode</p>
                    </div>
                </div>
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == 'gagal') {
                        echo "<div class='alert alert-danger text-center text-dark ' role='alert'>
                               Kode Transaksi Atau Password Transaksi Salah
                            </div>";
                    } elseif ($_GET['pesan'] == 'sudah') {
                        echo "<div class='alert alert-danger text-center text-dark ' role='alert'>
                            Kode Transaksi Ini Sudah Pernah Mencetak Tiket,Jadi Tidak Bisa Lagi
                            </div>";
                    } else {
                        echo "<div class='alert alert-info text-center text-dark' role='alert'>
                            Anda Harus Mengisi Terlebih Dahulu
                           </div>";
                    }
                } ?>
                <form id="myForm" action="proses_cetak.php" method="post" target="_blank">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control form-control-lg bg-light fs-6" name="trx" placeholder="Kode Transaksi" required>
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" class="form-control form-control-lg bg-light fs-6" name="password_trx" placeholder="Password Transaksi" required>
                    </div>

                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-dark w-100 fs-6 border-light" type="submit" name="cetak">Cetak</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    </div>


</body>


</html>