<?php
session_start();
include "conn.php";
include "assets/Link_bootstrap/link_bootstrap.php";
if ($_SESSION['id_role'] != 3) {
    echo "
         <script>
			window.location.href='login.php?pesan=kemana';
		</script>";
    die;
}
function decrypt($string)
{
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = '23432MLKJSDF0L2934897@00001';
    $secret_iv  = 'X0000W9876H5982@7676765';

    $key    = hash('sha256', $secret_key);
    $iv     = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

    return $output;
}
$enc_order = $_GET['id_order'];
$id_order = decrypt($enc_order);

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



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Anda</title>
</head>
<style>

</style>

<body>
    <div class="container">
        <?php foreach ($order as $key) { ?>
            <table class="table table-borderless justify-content-center">
                <tr>
                    <td style="background-color: wheat;"><?= $key['title'] ?></td>
                    <td style="background-color: wheat;" colspan="2"><label class="fs-4 fw-semibold"><?= $key['title'] ?></label></td>
                </tr>
                <tr>
                    <td style="background-color: wheat;"><?= $key['date'] ?></td>
                    <td style="background-color: wheat;" rowspan="2" colspan="2"><label class="fs-4 fw-semibold">Tanggal : <?= $key['day'] . ',' . date("d F Y", strtotime($key['date'])); ?></label></td>

                </tr>
                <tr>
                    <td style="background-color: wheat;">Time : <?= $key['clock'] ?></td>
                </tr>
                <tr>
                    <td style="background-color: wheat;">Kursi : <?= $key['variable_seat'] . $key['number_seat'] ?></td>
                    <td style="background-color: wheat;" rowspan="2"><label class="fs-4 fw-semibold">Kursi : <?= $key['variable_seat'] . $key['number_seat'] ?></label></td>
                    <td style="background-color: wheat;" rowspan="4"><label class="fw-bold" style="font-size: 100px;"><?= $key['name_teater'] ?></label></td>
                </tr>
                <tr>
                    <td style="background-color: wheat;">Teater <?= $key['name_teater'] ?></td>
                </tr>
                <tr>
                    <td style="background-color: wheat;"><?= $key['price'] ?></td>
                    <td style="background-color: wheat;"><label class="fs-4 fw-semibold">Harga : <?= $key['price'] ?></label></td>
                </tr>
                <tr>
                    <td style="background-color: wheat;">Movi3 </td>
                    <td style="background-color: wheat;"><label class="fs-4 fw-semibold">Movi3</label></td>
                </tr>
                <tr>
                    <td style="background-color: wheat;"><?= $key['trx'] ?></td>
                    <td style="background-color: wheat;" rowspan="2" colspan="2"><label class="fs-4 fw-semibold"> <?= $key['trx'] ?></label></td>
                </tr>
                <tr>
                    <td style="background-color: wheat;"><?= $key['date'] ?></td>
                </tr>
            </table>
        <?php } ?>
        <a href="cetak.php" class="btn btn-primary d-flex justify-content-center align-items-center mt-5">Kembali</a>
    </div>
</body>

<script>
    // window.onload = function() {
    window.print();
    // }
</script>

</html>