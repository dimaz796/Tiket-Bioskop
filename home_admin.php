<?php
include "navbar.php";
// if ($_SESSION['id_role'] != 1) {
//     echo "
//          <script>
// 			window.location.href='login.php';
// 		</script>";
// }

$sql = "SELECT COUNT(*) AS total FROM film";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_film = $row['total'];

$sql = "SELECT COUNT(*) AS total FROM teater";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_teater = $row['total'];

$sql = "SELECT COUNT(*) AS total FROM schedule";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_schedule = $row['total'];

$sql = "SELECT COUNT(*) AS total FROM trx";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_trx = $row['total'];

$sql = "SELECT COUNT(*) AS total FROM user WHERE id_role = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_admin = $row['total'];

$sql = "SELECT COUNT(*) AS total FROM user WHERE id_role =4";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_user = $row['total'];

$sql = "SELECT COUNT(*) AS total FROM user WHERE id_role =2";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_kasir = $row['total'];

$sql = "SELECT COUNT(*) AS total FROM `role`";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_role = $row['total'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "assets/Link_bootstrap/link_bootstrap.php" ?>
    <title>Beranda Admin</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Dasboard</h1>
        <div class="row g-3 mt-2">
            <div class="col-md-6 col-lg-4 col-xl-3">
                <a href="master_film.php" class="btn btn-dark w-100 border border-light">
                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?= $total_film ?></h3>
                            <p class="fs-5">Film</p>
                        </div>
                        <i class="bi bi-camera-reels-fill fs-1 primary-text rounded-circle p-3 mb-3"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <a href="master_seat.php" class="btn btn-dark w-100 border border-light">
                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?= $total_teater ?></h3>
                            <p class="fs-5">Teater</p>
                        </div>
                        <i class="bi bi bi-diagram-3-fill fs-1 primary-text rounded-circle p-3 mb-3"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <a href="master_schedule.php" class="btn btn-dark w-100 border border-light">
                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?= $total_schedule ?></h3>
                            <p class="fs-5">Jadwal Film</p>
                        </div>
                        <i class="bi bi-calendar-week-fill fs-1 primary-text rounded-circle p-3 mb-3"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <a href="master_transaksi.php" class="btn btn-dark w-100 border border-light">
                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?= $total_trx ?></h3>
                            <p class="fs-5">Transaksi</p>
                        </div>
                        <i class="bi bi-cart4 fs-1 primary-text rounded-circle p-3 mb-3"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <a href="master_user.php" class="btn btn-dark w-100 border border-light">
                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?= $total_admin ?></h3>
                            <p class="fs-5">Admin</p>
                        </div>
                        <i class="bi bi-person-fill fs-1 primary-text rounded-circle p-3 mb-3"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <a href="master_user.php" class="btn btn-dark w-100 border border-light">
                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?= $total_user ?></h3>
                            <p class="fs-5">User</p>
                        </div>
                        <i class="bi bi-person-fill fs-1 primary-text rounded-circle p-3 mb-3"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <a href="master_user.php" class="btn btn-dark w-100 border border-light">
                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?= $total_kasir ?></h3>
                            <p class="fs-5">Kasir</p>
                        </div>
                        <i class="bi bi-person-fill fs-1 primary-text rounded-circle p-3 mb-3"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <a href="master_role.php" class="btn btn-dark w-100 border border-light">
                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?= $total_role ?></h3>
                            <p class="fs-5">Role</p>
                        </div>
                        <i class="bi bi bi-file-earmark-person-fill fs-1 primary-text rounded-circle p-3 mb-3"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>


</body>

</html>