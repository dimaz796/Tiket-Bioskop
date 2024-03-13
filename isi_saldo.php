<?php
include "navbar.php";

if ($_SESSION['id_role'] != 4) {
    echo "<script>window.location.href='login.php';</script>";
    exit; // Keluar dari skrip agar tidak mengeksekusi kode di bawah
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Saldo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="body">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row rounded-4 p-4  bg-dark shadow box-area">
            <!-- Left Box Login -->
            <div class="col-md-6 d-flex justify-content-center align-item-center flex-columb left-box">
                <div class="featured-imag">
                    <img src="assets/img/kartu.jpg" class="img-fluid rounded" style="width: 100%; height: 100%;">
                </div>
            </div>

            <!-- Right Box Login -->
            <div class="col-md-6 right-box">
                <div class="row align-item-center">
                    <div class="text-center fs-3">
                        <p>Isi Saldo</p>
                    </div>
                    <div class="">
                        <?php
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] == 'gagal') {
                                echo "<div class='alert alert-danger text-center text-dark ' role='alert'>
                                    Nominal Kurang Dari Rp.10,000
                                    </div>";
                            }
                        }
                        ?>
                    </div>
                    <form action="proses_topup.php" method="post">
                        <div class="m-3 pb-5">
                            <br><small class="text-secondary">* Minimal Transaksi Rp.10,000</small>
                            <input type="number" name="total_topup" class="form-control mt-3" id="total_topup" aria-describedby="emailHelp" required>
                            <input type="hidden" name="id_user" id="<?= $_SESSION['id_user'] ?>">
                            <button type="submit" class="btn btn-dark border border-light mt-3" id="top-up" name="topup">Top Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>