<?php
date_default_timezone_set('Asia/Jakarta');
$Dimas_host = "localhost";
$Dimas_username = "root";
$Dimas_password = "";
$Dimas_database = "db_bioskop";

$conn = new mysqli($Dimas_host, $Dimas_username, $Dimas_password, $Dimas_database);

if ($conn->connect_error) {
    echo "Gagal Koneksi ke Database";
} else {
    //echo "Koneksi Berhasil";
}
