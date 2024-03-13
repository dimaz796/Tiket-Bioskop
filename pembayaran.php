<?php
session_start();
include "conn.php";
$id_user = $_SESSION['id_user'];
$sql = "SELECT saldo,id_user FROM user Where id_user = $id_user";
$user =  mysqli_query($conn, $sql);

$data_user = mysqli_fetch_array($user);
$saldo_user = $data_user['saldo'];
$total = $_GET['total'];
$id_order = $_GET['id_order'];
?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="./assets/css/style.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
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
            <div class="col-md-6 right-box p-5">
                <div class="row align-item-center">
                    <div class="header-text mb-2 text-center fs-3">
                        <p>Pembayaran</p>
                    </div>

                    <form action="proses_transaksi.php?id_order=<?= $id_order ?>&pesan=bayar" method="post">
                        <label for="" class="fs-5">Saldo Anda </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-ligth fs-6" readonly value="<?= "Rp. " . number_format($saldo_user) ?>">
                        </div>

                        <label for="" class="fs-5">Total Pembayaran</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6 mb-3" readonly value="<?= "Rp. " . number_format($total) ?>">
                        </div>


                        <div class="input-group mb-3 ">
                            <?php if ($saldo_user >= $total) : ?>
                                <button class="btn btn-lg btn-dark w-50 fs-6 border-light" name="beli" type="submit">Bayar</button>
                            <?php endif ?>
                            <a href="isi_saldo.php" class="btn btn-lg btn-dark w-50 fs-6 border-light" name="login" type="submit">Top Up</a>
                        </div>
                        <input type="hidden" name="total" value="<?= $total ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>