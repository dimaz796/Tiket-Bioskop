<?php
session_start();
include "conn.php";
// Transaksi Topup
if (isset($_POST['topup'])) {
    $total_topup = $_POST['total_topup'];
    if ($total_topup < 10000) {
        echo "
		<script>
				window.location.href='isi_saldo.php?pesan=gagal';
		</script>";
        die;
    }

    $id_topup = mt_rand(10 ** 11, (10 ** 12) - 1);
    $id_user = $_SESSION['id_user'];
    $status_topup = 'Menunggu Pembayaran';
    $date = date('Y-m-d H:i:s');

    $sql = "SELECT * FROM transaksi_topup 
            INNER JOIN user ON transaksi_topup.id_user=user.id_user
            WHERE transaksi_topup.id_user = '$id_user' AND
            (transaksi_topup.status_topup = 'Menunggu Pembayaran' OR transaksi_topup.status_topup = 'Kirim Bukti Pembayaran');;
";
    $transaksi = mysqli_query($conn, $sql);
    $count_transaksi = mysqli_num_rows($transaksi);

    if ($count_transaksi > 0) {
        echo "
		<script>
             alert('Ada Transaksi Topup Yang Belum Selesai,Segera Selesaikan');
				window.location.href='transaksi_topup.php';
		</script>";
        die;
    }

    $sql = "INSERT INTO `transaksi_topup`
            VALUES ('$id_topup','$date','$id_user', '$total_topup', '$status_topup','');";
    $query = mysqli_query($conn, $sql);

    header("location:bayar_topup.php?id_topup=$id_topup");
} elseif (isset($_POST['bukti'])) {
    $id_topup = $_POST['id_topup'];
    $result_gambar = $id_topup . '.png';
    $status_topup = "Menunggu Persetujuan Admin";
    $bukti = $_FILES['bukti']['name'];
    $lokasibukti = $_FILES['bukti']['tmp_name'];
    if ($bukti) {
        move_uploaded_file($lokasibukti, 'assets/img/struk_topup/' . $result_gambar);
    }
    $sql = "UPDATE `transaksi_topup`
            SET `status_topup` = '$status_topup',`bukti_pembayaran` = '$result_gambar'
            WHERE `transaksi_topup`.`id_topup` = '$id_topup';";
    $update_topup = mysqli_query($conn, $sql);

    if ($update_topup) {
        echo "
		<script>
				alert('Bukti Berhasil Di Kirim');
				window.location.href='transaksi_topup.php';
		</script>";
    } else {
        echo "
		<script>
				alert('Bukti Gagal Di Kirim');
				window.location.href='bukti_pembayaran.php';
		</script>";
    }
}
// Bukti Pembayaran
elseif (isset($_GET['status'])) {
    $id_topup = $_GET['id_topup'];
    if ($_GET['status'] == "berhasil") {
        $status_topup = "Transaksi Berhasil";

        // Mengganti Status Topup
        $sql = "UPDATE `transaksi_topup`
            SET `status_topup` = '$status_topup'
            WHERE `transaksi_topup`.`id_topup` = '$id_topup';";
        $update_topup = mysqli_query($conn, $sql);

        // Cek Transaksi
        $sql = "SELECT * FROM transaksi_topup 
        INNER JOIN user ON transaksi_topup.id_user=user.id_user
        WHERE transaksi_topup.id_topup = $id_topup";
        $topup = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($topup);
        $total_topup = $row['total_topup'];
        $id_user = $row['id_user'];
        $nama_user = $row['nama_user'];
        $saldo = $row['saldo'];

        $saldo_akhir = $saldo + $total_topup;


        $sql = "UPDATE `user` 
                SET `saldo` = '$saldo_akhir'
                WHERE `user`.`id_user` = $id_user;";
        $transaksi = mysqli_query($conn, $sql);

        if ($transaksi && $update_topup) {
            echo "
                <script>
                        alert('Konfirmasi Selesai,Saldo Di Isi Ke Akun Dengan Nama $nama_user Dengan Nominal Rp.$total_topup');
                        window.location.href='master_topup.php';
                </script>";
        } else {
            echo "
                <script>
                        alert('Konfirmasi Gagal Karna Ada Kesalahan');
                        window.location.href='detail_bukti_pembayaran.php?id_topup=$id_topup&total=$total_topup';
                </script>";
        }
    } elseif ($_GET['status'] == "gagal") {
        $status_topup = "Transaksi Gagal";

        // Mengganti Status Topup
        $sql = "UPDATE `transaksi_topup`
            SET `status_topup` = '$status_topup'
            WHERE `transaksi_topup`.`id_topup` = '$id_topup';";
        $update_topup = mysqli_query($conn, $sql);


        if ($update_topup) {
            echo "
                <script>
                        alert('Konfirmasi Berhasil,Saldo Tidak Di Tambahkan');
                        window.location.href='master_topup.php';
                </script>";
        } else {
            echo "
                <script>
                        alert('Konfirmasi Gagal Karna Ada Kesalahan');
                        window.location.href='detail_bukti_pembayaran.php?id_topup=$id_topup&total=$total_topup';
                </script>";
        }
    }
    // Hapus Topup
    elseif ($_GET['status'] == "hapus") {
        $sql = "DELETE FROM transaksi_topup WHERE `transaksi_topup`.`id_topup` = '$id_topup'";
        $hapus_topup = mysqli_query($conn, $sql);
        if ($hapus_topup) {
            echo "
                <script>
                        alert('Data Topup Berhasil Di Hapus');
                        window.location.href='transaksi_topup.php';
                </script>";
        } else {
            echo "
                <script>
                        alert('Data Topup Gagal Di Hapus');
                        window.location.href='transaksi_topup.php';
                </script>";
        }
    }
}
// Transaksi Topup
elseif (isset($_POST['bayar_topup'])) {
    $id_topup = $_POST['id_topup'];
    $total_topup = $_POST['total_topup'];
    $bayar_saldo = $_POST['bayar_saldo'];
    if ($bayar_saldo != $total_topup) {
        echo "
                <script>
                        alert('Anda Memasukan Dana Yang Tidak Sesuai,Seharusnya Rp.$total_topup');
                        window.location.href='bayar_topup.php?id_topup=$id_topup';
                </script>";
        die;
    }

    // Merubah Status Topup
    $status_topup = "Kirim Bukti Pembayaran";
    $sql = "UPDATE `transaksi_topup`
            SET `status_topup` = '$status_topup'
            WHERE `transaksi_topup`.`id_topup` = '$id_topup';";
    $update_topup = mysqli_query($conn, $sql);

    if ($update_topup) {
        echo "
            <script>
                    alert('Transaksi Topup Berhasil');
                    window.location.href='struk_topup.php?id_topup=$id_topup';
            </script>";
    } else {
        echo "
            <script>
                    alert('Transaksi Topup Gagal');
                    window.location.href='bayar_topup.php?id_topup=$id_topup';
            </script>";
    }
}
