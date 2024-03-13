<?php include "navbar.php";
$id_order = $_GET['id_order'];

$sql = "SELECT * FROM `order`
INNER JOIN trx 
ON trx.id_order = order.id_order
INNER JOIN schedule 
ON schedule.id_schedule = order.id_schedule
INNER JOIN user 
ON user.id_user = order.id_user
INNER JOIN teater 
ON teater.id_teater = order.id_teater
INNER JOIN film 
ON film.id_film = schedule.id_film
INNER JOIN detail_order 
ON detail_order.id_order = order.id_order
INNER JOIN seat 
ON seat.id_seat = detail_order.id_seat
WHERE `order`.`id_order` = $id_order";
$order = mysqli_query($conn, $sql);

while ($order_data = mysqli_fetch_array($order)) {
    $id_order = $order_data['id_order'];
    $day = $order_data['day'];
    $title = $order_data['title'];
    $date = $order_data['date'];
    $clock = $order_data['clock'];
    $name_teater = $order_data['name_teater'];
    $trx = $order_data['trx'];
    $status_cetak = $order_data['status_cetak'];
    $password_trx = $order_data['password_trx'];
    $date = date("d F Y", strtotime($date));
    $name_seat[] = $order_data['variable_seat'] . $order_data['number_seat'];
}
$tiket = count($name_seat);
$seat = implode(', ', $name_seat);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Anda</title>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row rounded-4 p-4 bg-dark shadow box-area img">
            <!-- Header -->
            <div class="col-8 ">
                <div class="fs-2 fw-bold text-warning"><?= strtoupper($title) ?></div>
            </div>
            <div class="col-4">
                <h2 class="text-center fw-bold">Movi<span class="span">3</span> </h2>
            </div>
            <!-- Tanggal Mulai -->
            <div class="col-4 mt-5 border-end">
                <div class="text-secondary fs-5"><?= $day ?></div>
                <div class="fs-4 fw-semibold"><?= strtoupper($date) ?></div>
            </div>
            <!-- Teater -->
            <div class="col-5 mt-5 border-end">
                <div class="text-secondary fs-5 ms-2">TEATER</div>
                <div class="fs-4 fw-semibold ms-2">TEATER <?= $name_teater ?></div>
            </div>
            <!-- Jadwal Jam -->
            <div class="col-3 mt-5 ">
                <div class="text-secondary fs-5 ms-2">JAM</div>
                <div class="fs-4 fw-semibold ms-2">
                    <?php $clock = substr($clock, 11);
                    $clock = substr($clock, 0, -3);
                    echo $clock; ?>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4 mt-5 col-5">
                <div class="text-secondary fs-4">BOOKING</div>
                <div class="text-secondary fs-4">PASSWORD</div>
                <div class="text-secondary fs-4"><?= $tiket ?> TIKET</div>
            </div>
            <div class="col-sm-6 col-xl-5 mt-5 col-7">
                <div class="fw-medium fs-4"><?= $trx ?></div>
                <div class="fw-medium fs-4"><?= $password_trx ?></div>
                <div class="fw-normal fs-4"><?= $seat ?></div>
            </div>
            <div class="col-sm-6 col-xl-3  col-5 mt-5">
                <div class="d-flex  d-flex justify-content-center align-items-center">
                    <img src="assets/img/img-qrqode/<?= $trx ?>.png" style="width: 80%;">
                </div>
            </div>
            <div class="col-14 mt-4">
                <div class="text-secondary">Status Tiket : <?= $status_cetak ?></div>
            </div>
            <div class="col-12 mt-1">
                <hr>
            </div>
            <div class="col-12 mt-2">
                <div class="text-center text-secondary">Ini Adalah Pesanan Atas Nama <?= $_SESSION['nama_user'] ?>!</div>
            </div>
        </div>

    </div>
</body>

</html>