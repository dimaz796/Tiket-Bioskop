<?php
include "navbar.php";

if (!isset($_SESSION['id_role']) || $_SESSION['id_role'] == 3 || $_SESSION['id_role'] == 2) {
    echo "
    <script>
    window.location.href='login.php?pesan=kemana';
   </script>";
}

$id_topup = $_GET['id_topup'];

$sql = "SELECT * FROM transaksi_topup 
        INNER JOIN user ON transaksi_topup.id_user=user.id_user
        WHERE transaksi_topup.id_topup = $id_topup;
";
$querry = mysqli_query($conn, $sql);

while ($topup_data = mysqli_fetch_array($querry)) {
    $id_topup = $topup_data['id_topup'];
    $status_topup = $topup_data['status_topup'];
    $bukti_pembayaran = $topup_data['bukti_pembayaran'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row rounded-4 p-4 bg-dark shadow box-area img">
            <div class="col-12">
                <div class="fw-semibold fs-2 mb-5 text-center">Bukti Transaksi</div>
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center">
                <img src="./assets/img/struk_topup/<?= $bukti_pembayaran ?>" alt="" style="width: 80%;">
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center mt-5">
                <?php if ($_SESSION['id_role'] == 1 && $status_topup == 'Menunggu Persetujuan Admin') { ?>
                    <a href="proses_topup.php?id_topup=<?= $id_topup ?>&status=berhasil">
                        <button class="btn btn-success me-3">Berhasil</button>
                    </a>
                    <a href="proses_topup.php?id_topup=<?= $id_topup ?>&status=gagal">
                        <button class="btn btn-danger">Gagal</button>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>