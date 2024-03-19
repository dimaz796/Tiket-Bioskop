<?php
include "navbar.php";
$id_user = $_SESSION['id_user'];
$date_now = date('Y-m-d');

$sql = "SELECT film.title,order.id_order,order.date,user.nama_user,user.id_user,schedule.clock,teater.name_teater,order.status_order,order.total,trx.trx FROM `order`
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
WHERE user.id_user = $id_user AND order.status_order = 'Sudah Di Bayar'
ORDER BY id_order DESC 
";
$querry = mysqli_query($conn, $sql);

$count = mysqli_num_rows($querry);

$sql = "SELECT film.title,order.id_order,order.date,user.nama_user,user.id_user,schedule.clock,teater.name_teater,order.status_order,order.total,trx.trx FROM `order`
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
WHERE user.id_user = $id_user AND order.status_order = 'Sudah Di Bayar' AND order.date = '$date_now'
ORDER BY id_order DESC 
";
$querry_now = mysqli_query($conn, $sql);
$row = $querry->fetch_assoc();
if (isset($row)) {
    $date_order = $row['date'];
}

include "assets/phpqrcode/qrlib.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/phpqrcode/">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-Xf3Hc5v04gJprXDWb0sRfJotWItgAxjGDD0C5ib/2lhoAweRr+m3N5wPUZjpjwnX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Data Riwayat Transaksi</title>

</head>

<body>
    <div class="container pt-4">
        <?php

        if ($count == 0) {
            echo "<h1>Tidak Ada Riwayat Transaksi</h1>
        <label>Silahkan Order Terlebih Dahulu <a href='index.php'>Klik Disini</a></label>
        ";
        } else {
        ?>
            <?php if ($date_now == $date_order) { ?>
                <h1>Riwayat Transaksi Hari Ini</h1>

                <table class="table table-bordered table-striped table-hover mt-4" style="width:100%">
                    <thead>
                        <tr>
                            <th>kode transaksi</th>
                            <th>Judul film</th>
                            <th>Tanggal Order </th>
                            <th>Jam Tayang</th>
                            <th>Teater</th>
                            <th>Atas Nama</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <?php
                    foreach ($querry_now as $index => $row) {
                        if ($row['status_order'] == 'Belum Bayar') {
                            $status = 'danger';
                        } else {
                            $status = 'success';
                        } ?>
                        <tr>
                            <td>
                                <?php
                                if (isset($row['trx'])) {

                                    $tempdir = "assets/img/img-qrqode/";
                                    if (!file_exists($tempdir))
                                        mkdir($tempdir, 0755);
                                    $file_name = $row['trx'] . ".png";
                                    $file_path = $tempdir . $file_name;

                                    QRcode::png($file_name, $file_path, "H", 6, 4);
                                }
                                echo $row['trx'];
                                ?>
                            </td>
                            <td><?= $row['title']; ?></td>
                            <td><?= $row['date'] ?></td>
                            <td><?php $clock = substr($row['clock'], 11);
                                $clock = substr($clock, 0, -3);
                                echo $clock; ?>
                            </td>
                            <td><?= $row['name_teater']; ?></td>
                            <td><?= $row['nama_user']; ?></td>
                            <td>Rp. <?= number_format($row['total']); ?></td>
                            <td>
                                <div class="bg-<?= $status ?> text-center rounded-2"><?= $row['status_order']; ?></div>
                            </td>
                            <td align="center">

                                <a href="tiket_order.php?id_order=<?= $row['id_order'] ?>">
                                    <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                                </a>
                                <a href="detail_order.php?id_order=<?= $row['id_order'] ?>">
                                    <button class="btn btn-primary"><i class="bi bi-journal-text"></i></button>
                                </a>

                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php }
            $sql = "SELECT film.title,order.id_order,order.date,user.nama_user,user.id_user,schedule.clock,teater.name_teater,order.status_order,order.total,trx.trx FROM `order`
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
                WHERE user.id_user = $id_user AND order.status_order = 'Sudah Di Bayar' AND order.date != '$date_now'
                ORDER BY date DESC 
                ";
            $querry_not_now = mysqli_query($conn, $sql);
            $count_trx = mysqli_num_rows($querry_not_now);
            if ($count_trx > 0) { ?>
                <h1>Riwayat Transaksi Anda</h1>

                <small class="text-warning">*Di Urutkan Dari Yang Terbaru</small>
                <table id="example" class="table table-bordered table-striped table-hover mt-4" style="width:100%">
                    <thead>
                        <tr>
                            <th>kode transaksi</th>
                            <th>Judul film</th>
                            <th>Tanggal Order </th>
                            <th>Jam Tayang</th>
                            <th>Teater</th>
                            <th>Atas Nama</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <?php
                    foreach ($querry_not_now as $index => $row) {
                        if ($row['status_order'] == 'Belum Bayar') {
                            $status = 'danger';
                        } else {
                            $status = 'success';
                        } ?>
                        <tr>
                            <td>
                                <?php
                                if (isset($row['trx'])) {

                                    $tempdir = "assets/img/img-qrqode/";
                                    if (!file_exists($tempdir))
                                        mkdir($tempdir, 0755);
                                    $file_name = $row['trx'] . ".png";
                                    $file_path = $tempdir . $file_name;

                                    QRcode::png($file_name, $file_path, "H", 6, 4);
                                }
                                echo $row['trx'];
                                ?>
                            </td>
                            <td><?= $row['title']; ?></td>
                            <td><?= $row['date'] ?></td>
                            <td><?php $clock = substr($row['clock'], 11);
                                $clock = substr($clock, 0, -3);
                                echo $clock; ?>
                            </td>
                            <td><?= $row['name_teater']; ?></td>
                            <td><?= $row['nama_user']; ?></td>
                            <td>Rp. <?= number_format($row['total']); ?></td>
                            <td>
                                <div class="bg-<?= $status ?> text-center rounded-2"><label class="ps-2 pe-2 pt-1 pb-1"><?= $row['status_order']; ?></label></div>
                            </td>
                            <td align="center">
                                <a href="tiket_order.php?id_order=<?= $row['id_order'] ?>">
                                    <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                                </a>
                                <a href="detail_order.php?id_order=<?= $row['id_order'] ?>">
                                    <button class="btn btn-dark"><i class="bi bi-journal-text"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } else {
            }
            ?>

        <?php
        }
        ?>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>