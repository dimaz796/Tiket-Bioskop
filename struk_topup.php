<?php
include "conn.php";
session_start();
if ($_SESSION['id_role'] != 4) {
    echo "
    <script>
    window.location.href='login.php?pesan=kemana';
   </script>";
}
$id_topup = $_GET['id_topup'];

$sql = "SELECT * FROM transaksi_topup 
        INNER JOIN user ON transaksi_topup.id_user = user.id_user
        WHERE id_topup=$id_topup";
$topup = mysqli_query($conn, $sql);
$data_topup = mysqli_fetch_assoc($topup);
$total_topup = $data_topup['total_topup'];
$date = $data_topup['date'];
$nama_user = $data_topup['nama_user'];
$telepon_user = $data_topup['telepon'];



$sql = "SELECT * FROM user 
        WHERE id_user=5";
$manager = mysqli_query($conn, $sql);
$data_manager = mysqli_fetch_assoc($manager);
$telepon_manager = $data_manager['telepon'];
$nama_manager = $data_manager['nama_user'];

$status_user = ($_SESSION['id_role'] == 4) ? 'transaksi_topup.php' : 'master_topup.php';

?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="./assets/css/style.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
</head>



<body class="body">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row rounded-4 p-4  bg-dark shadow box-area ">

            <!-- Struk -->
            <div class="row">
                <div class="col-12 text-center pb-5">
                    <label class=" fs-2 text-center mb-3 fw-semibold">Struk Topup Movi3</label>
                </div>
                <div class="col-lg-6">
                    <p class="fw-semibold">Transaksi : <?= $id_topup ?></p>
                </div>
                <div class="col-lg-6">
                    <p class="fw-semibold">Tanggal : <?= date('H:i:s d M Y ', strtotime($date)); ?></p>
                </div>
                <hr>
                <!-- Penerima -->
                <div class="col-lg-6">
                    <label class=" fs-6">Rekening Tujuan</label>
                </div>
                <div class="col-lg-6">
                    <p class="fw-semibold"> <?= $telepon_manager ?></p>
                </div>
                <div class="col-lg-6">
                    <label class=" fs-6">Nama Penerima </label>
                </div>
                <div class="col-lg-6">
                    <p class="fw-semibold"> <?= $nama_manager ?></p>
                </div>
                <!-- Penerima -->
                <hr>
                <!-- Pengirim -->
                <div class="col-lg-6">
                    <label class=" fs-6">Rekening Pengirim</label>
                </div>
                <div class="col-lg-6">
                    <p class="fw-semibold"> <?= $telepon_user ?></p>
                </div>
                <div class="col-lg-6">
                    <label class=" fs-6">Nama Pengirim </label>
                </div>
                <div class="col-lg-6">
                    <p class="fw-semibold"> <?= $nama_user ?></p>
                </div>
                <div class="col-lg-6">
                    <label class=" fs-6">Total Kirim</label>
                </div>
                <div class="col-lg-6">
                    <p class="fw-semibold">Rp.<?= number_format($total_topup) ?></p>
                </div>
                <div class="col-lg-6">
                    <label class=" fs-6">Status Pembayaran</label>
                </div>
                <div class="col-lg-6">
                    <p class="fw-semibold">Berhasil</p>
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <small class="text-center mb-3 fw-semibold text-secondary mt-5">*ScreenShot Di Sini</small>
                </div>

                <a href="<?= $status_user ?>" type="submit" class="btn btn-dark border-light  w-100 mb-3">Kembali Ke Home </a>
                <!-- Struk -->
            </div>
        </div>
</body>

</html>