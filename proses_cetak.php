<?php
include "conn.php";
include "assets/phpqrcode/qrlib.php";
function encrypt($string)
{
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = '23432MLKJSDF0L2934897@00001';
    $secret_iv = 'X0000W9876H5982@7676765';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
    return $output;
}

if (isset($_POST['cetak']) || isset($_GET['cetak'])) {

    if (isset($_GET['cetak'])) {
        $transaksi = $_GET['trx'];
        $password_transaksi = $_GET['password_trx'];
    } else {
        $transaksi = $_POST['trx'];
        $password_transaksi = $_POST['password_trx'];
    }

    // Membuat Qr Qode
    $tempdir = "assets/img/img-qrqode/";
    if (!file_exists($tempdir))
        mkdir($tempdir, 0755);
    $file_name = $transaksi . ".png";
    $file_path = $tempdir . $file_name;

    QRcode::png($file_name, $file_path, "H", 6, 4);
    $sql = "SELECT * FROM trx 
            WHERE trx = $transaksi AND password_trx = $password_transaksi";
    $cek_trx = mysqli_query($conn, $sql);
    $data_trx = mysqli_fetch_assoc($cek_trx);
    $status_cetak = $data_trx['status_cetak'];

    if ($status_cetak == 'Sudah Di Cetak') {
        echo "
        <script>
        window.location.href='cetak.php?pesan=sudah';
        </script>";
        die;
    }

    $count = mysqli_num_rows($cek_trx);
    if ($count > 0) {

        $sql = "SELECT * FROM `trx` 
        JOIN `order` ON `trx`.`id_order`=`order`.`id_order` 
        WHERE `trx` = '$transaksi'";
        $trx = mysqli_query($conn, $sql);
        foreach ($trx as $row) {
            $id_order = $row['id_order'];
        }
        // Update Status Tiket Jadi Sudah DI Cetak
        $sql = "UPDATE `trx` SET `status_cetak` = 'Sudah Di Cetak' 
                WHERE `trx`.`trx` = '$transaksi';";
        $update_status = mysqli_query($conn, $sql);

        $id_order = encrypt($id_order);
        echo "<script>
        window.location.href='cetak_tiket.php?id_order=$id_order';
        </script>";
    } else {
        echo "<script>
        window.location.href='cetak.php?pesan=gagal';
        </script>";
    }
} else {
    echo "Tidak";
}
