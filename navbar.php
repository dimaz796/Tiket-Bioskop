<!DOCTYPE html>
<?php
include "conn.php";
session_start();
$saldo_user = 0;
if (isset($_SESSION['id_role'])) {
    $id_role = $_SESSION['id_role'];
    $id_user = $_SESSION['id_user'];
    $sql = "SELECT saldo,id_user FROM user Where id_user = $id_user";
    $user =  mysqli_query($conn, $sql);

    $data_user = mysqli_fetch_array($user);
    $saldo_user = $data_user['saldo'];
} else {
    $id_role = 0;
}
date_default_timezone_set('Asia/Jakarta');
include "assets/Link_bootstrap/link_bootstrap.php";
?>

<html lang="en">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
</style>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="./assets/css/style.css">


<body class="body">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h2 class="fs-2 fw-bold">Movi<span class="span">3</span> </h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <?php if ($id_role == 1) : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="home_admin.php">Beranda</a>
                        </li>
                    </ul>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data Master
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="master_film.php">Film</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="master_seat.php">Kursi</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="master_genre.php">Genre</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="master_dimension.php">Dimensi</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="master_schedule.php">Jadwal</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="master_teater.php">Teater</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="master_price.php">Harga</a>
                            </li>
                        </ul>

                    </div>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data User
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="master_user.php">User</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="master_role.php">Role</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data Transaksi
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="master_transaksi.php">Transaksi Tiket</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="master_topup.php">Transaksi Topup</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown ms-auto">
                        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['nama_user'] ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>

                    </div>
                <?php elseif ($id_role == 2) : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="laporan.php">Laporan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="riwayat_laporan.php">Riwayat</a>
                        </li>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cetak Laporan
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="laporan_harian.php">Laporan Harian</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="laporan_mingguan.php">Laporan Lebih Dari 1 Hari</a>
                                </li>

                            </ul>
                        </div>


                        <div class="dropdown ms-auto"">
                            <button class=" btn btn-warning dropdown-toggle fixed-end" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['nama_user'] ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </ul>

                <?php elseif ($id_role == 3) : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="home_kasir.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="berlangsung.php">Film Berlangsung</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="riwayat.php">Riwayat Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="cetak.php">Cetak Tiket</a>
                        </li>
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle fixed-end" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['nama_user'] ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </ul>
                <?php elseif ($id_role == 4) : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="akan_datang.php">Akan Datang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="berlangsung.php">Berlangsung</a>
                        </li>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Riwayat
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="transaksi.php">Menunggu Pembayaran</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="riwayat.php">Transaksi Tiket</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="transaksi_topup.php">Transaksi Topup</a>
                                </li>
                            </ul>
                        </div>


                        <div class="dropdown ms-auto">
                            <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['nama_user'] ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Saldo Anda : Rp. <?= number_format($saldo_user) ?> </a></li>
                                <li><a class="dropdown-item" href="ganti_password.php">Pengaturan</a></li>
                                <li><a class="dropdown-item" href="isi_saldo.php">Top Up</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>

                        </div>
                    </ul>

                <?php else : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="akan_datang.php">Akan Datang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="berlangsung.php">Berlangsung</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    </ul>
                <?php endif; ?>
                <ul>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>