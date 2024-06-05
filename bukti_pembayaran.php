<?php
include "navbar.php";

if ($_SESSION['id_role'] != 4) {
    echo "<script>window.location.href='login.php';</script>";
    exit; // Keluar dari skrip agar tidak mengeksekusi kode di bawah
}
$id_topup = $_GET['id_topup'];

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
    <div class="container justify-item-center position-absolute top-50 start-50 translate-middle bg-dark" style="width:400px;height:200px">
        <a href="jadwal_film.php" class="position-absolute top-0 end-0 fs-5 me-2 tiket-x">X</a>
        <form action="proses_topup.php" method="post" enctype="multipart/form-data">
            <div class="m-3">
                <label for="total_topup" class="form-label fs-3 text-center" id="total_saldo_label">Bukti Pembayaran</label>
                <input type="file" name="bukti" class="form-control" id="total_topup" aria-describedby="emailHelp" required>
                <input type="hidden" name="id_topup" value="<?= $id_topup ?>">
            </div>
            <button type="submit" class="btn btn-warning ms-3" id="top-up" name="bukti">Kirim Bukti</button>
        </form>
    </div>

</body>

</html>