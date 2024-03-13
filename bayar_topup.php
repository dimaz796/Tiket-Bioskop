<?php
include "conn.php";
$id_topup = $_GET['id_topup'];

$sql = "SELECT * FROM transaksi_topup 
        WHERE id_topup=$id_topup";
$topup = mysqli_query($conn, $sql);
$data_topup = mysqli_fetch_assoc($topup);
$total_topup = $data_topup['total_topup'];

$sql = "SELECT * FROM user 
        WHERE id_user=5";
$manager = mysqli_query($conn, $sql);
$data_manager = mysqli_fetch_assoc($manager);
$telepon = $data_manager['telepon'];
$nama_user = $data_manager['nama_user'];

?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="./assets/css/style.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Tiket</title>
</head>



<body class="body">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row rounded-4 p-4  bg-dark shadow box-area ">

            <form action="proses_topup.php" method="POST">
                <!-- FORM -->
                <div class="row">
                    <div class="col-12">
                        <label class="form-label fs-2 text-center mb-3 fw-semibold">Bayar Topup</label>
                    </div>
                    <div class="col-4">
                        <label class=" fs-6">Rekening Tujuan</label>
                        <input type="number" name="telepon_manager" class="form-control mt-2" value="<?= $telepon ?>" readonly>
                    </div>
                    <div class="col-4">
                        <label class=" fs-6">Atas Nama</label>
                        <input type="text" name="nama_manager" class="form-control mt-2" value="<?= $nama_user ?>" readonly>
                    </div>
                </div>

                <label class=" fs-4 mt-4">Masukan Dana Pembayaran</label><br>
                <small class="text-secondary">* Untuk Transaksi Ini Anda Harus Memasukan Rp.<?= number_format($total_topup) ?> Atau Rp. <?= $total_topup ?></small>
                <input type="number" name="bayar_saldo" class="form-control mb-4 mt-3" required>
                <input type="hidden" name="id_topup" value="<?= $id_topup ?>">
                <input type="hidden" name="id_manager" value="5">
                <input type="hidden" name="total_topup" value="<?= $total_topup ?>">

                <button type="submit" class="btn btn-dark border-light  w-100 mb-3" name="bayar_topup">Bayar</button>
                <!-- FORM -->

            </form>
        </div>
    </div>
</body>

</html>