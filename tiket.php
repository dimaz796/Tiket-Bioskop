<?php
include "conn.php";
$id_film = $_GET['id_film'];
$time = $_GET['time'];
$id_schedule = $_GET['id_schedule'];
$sql = "SELECT * FROM schedule WHERE id_schedule = $id_schedule";
$schedule = mysqli_query($conn, $sql);

while ($schedule_data = mysqli_fetch_array($schedule)) {
    $id_teater = $schedule_data['id_teater'];
}

$sql = "SELECT count(*) as total_seat FROM `seat` WHERE id_teater = '$id_teater' AND `status_seat` = 'Kosong'";
$seat = mysqli_query($conn, $sql);
$row = $seat->fetch_assoc();
$total_seat = $row['total_seat'];

$sql = "SELECT *  FROM `teater` WHERE id_teater = '$id_teater'";
$teater = mysqli_query($conn, $sql);
$data_teater = $teater->fetch_assoc();
$name_teater = $data_teater['name_teater'];

$sql = "SELECT count(*) as total_seat_terisi FROM `detail_order` 
        INNER JOIN `order` ON `order`.id_order=`detail_order`.id_order 
        INNER JOIN `schedule` ON `schedule`.id_schedule=`order`.id_schedule 
        WHERE `schedule`.id_teater = '$id_teater' AND `order`.id_schedule='$id_schedule'
        AND (`detail_order`.`status_kursi` = 'Terisi' OR `detail_order`.`status_kursi` = 'Booking');";
$seat_terisi = mysqli_query($conn, $sql);
$detail_seat = $seat_terisi->fetch_assoc();
$total_seat_terisi = $detail_seat['total_seat_terisi'];

$seat_kosong = $total_seat - $total_seat_terisi;
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

            <form action="kursi.php" method="POST">
                <input type="hidden" name="id_film" value="<?= $id_film ?>">
                <input type="hidden" name="id_schedule" value="<?= $id_schedule ?>">
                <input type="hidden" name="time" value="<?= $time ?>">
                <input type="hidden" name="seat_kosong" value="<?= $seat_kosong ?>">
                <!-- FORM -->
                <div class="col-12">
                    <label class="form-label fs-2 text-center mb-3 fw-semibold">Masukan Jumlah Tiket</label>
                </div>
                <div class="col-4">
                    <label class="form-label fs-4 ">Studio : <?= $name_teater ?></label>
                </div>
                <div class="col-6">
                    <label class="form-label fs-6 ">Kursi Tersedia : <?= $seat_kosong ?></label>
                </div>
                <input type="number" name="tiket" class="form-control mb-4 mt-3" required>
                <!-- FORM -->
                <button type="submit" class="btn btn-dark border-light  w-100 mb-3" name="beli">Order</button>

            </form>
        </div>
    </div>
</body>

</html>