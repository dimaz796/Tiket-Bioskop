<?php
include "conn.php";
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

if (isset($_POST['cetak'])) {
    $transaksi = $_POST['trx'];
    $password_transaksi = $_POST['password_trx'];

    $sql = "SELECT * FROM trx 
            WHERE trx = $transaksi AND password_trx = $password_transaksi";
    $cek_trx = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($cek_trx);
    if ($count > 0) {
        $sql = "SELECT * FROM `trx` 
        JOIN `order` ON `trx`.`id_order`=`order`.`id_order` 
        WHERE `trx` = '$transaksi'";
        $trx = mysqli_query($conn, $sql);
        foreach ($trx as $row) {
            $id_order = $row['id_order'];
        }
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
