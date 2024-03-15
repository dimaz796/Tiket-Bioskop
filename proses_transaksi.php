<?php
session_start();
include('conn.php');

if (isset($_POST['pesan'])) {
    $id_user = $_SESSION['id_user'];

    //Jika Anda Kasir
    if ($_SESSION['id_role'] == 3) {
        // Mengambil Data Dari COnfirm
        $id_film = $_POST['id_film'];
        $price = $_POST['price'];
        $total = $_POST['total'];
        $seat = $_POST['seat'];
        $id_schedule = $_POST['id_schedule'];
        $id_teater = $_POST['id_teater'];
        $date = $_POST['date'];
        $status_order = 'Sudah Di Bayar';

        // Membuat Field Order
        $sql = "INSERT INTO `order` (`id_order`, `date`, `id_user`, `id_schedule`, `id_teater`, `status_order`, `Total`) 
        VALUES (NULL, '$date', '$id_user', '$id_schedule', '$id_teater', '$status_order', '$total');";
        $querry = mysqli_query($conn, $sql);

        // Mencari Id Order
        $sql = "SELECT id_order FROM `order` order by id_order desc limit 1";
        $order =  mysqli_query($conn, $sql);
        $data_order = mysqli_fetch_assoc($order);
        $id_order = $data_order['id_order'];

        // Membuat Detail Order 
        foreach ($order as $key) {
            $id_order = $key['id_order'];

            $order = mysqli_query($conn, $sql);
            foreach ($seat as $index => $value) {
                $sql = "INSERT INTO `detail_order` VALUES (NULL, '$id_order', '$value', '$price','Terisi');";
                $detail_order =  mysqli_query($conn, $sql);
            }
        }
        // Membuat Kode TRansaksi
        $date_kode = str_replace("-", "", $date);
        $kode_trx = "1933" . $date_kode . $id_user . $id_order;

        // Membuat Password Untuk Transaksi
        $bilangan_acak = '';
        for ($i = 0; $i < 6; $i++) {
            $bilangan_acak .= mt_rand(0, 9);
        }

        // Membuat Field Tabel Transaksi
        $sql = "INSERT INTO trx
                VALUES ('$kode_trx', '$id_order', '$bilangan_acak','Belum Di Cetak');";
        $create_trx =  mysqli_query($conn, $sql);

        if ($create_trx) {
            echo "
            <script>
                    alert('Transaksi Berhasil,Tiket Akan Segera Di Cetak');
                    window.location.href='proses_cetak.php?cetak=ada&trx=$kode_trx&password_trx=$bilangan_acak';
            </script>";
        } else {
            echo "
            <script>
                alert('Transaksi Gagal,Periksa Kembali');
                window.location.href='confirm_order.php';
            </script>";
        }
        die;
    }

    $sql = "SELECT id_order FROM `order` WHere id_user = $id_user AND status_order = 'Belum Bayar'";
    $cek_order =  mysqli_query($conn, $sql);
    $count = mysqli_num_rows($cek_order);

    if ($count > 0) {
        echo "
		<script>
				alert('Ada Transaksi Yang Belum Anda Bayar,Silahkan Bayar Dulu');
				window.location.href='transaksi.php';
		</script>";
        die;
    }

    $id_film = $_POST['id_film'];
    $price = $_POST['price'];
    $total = $_POST['total'];
    $seat = $_POST['seat'];
    $id_schedule = $_POST['id_schedule'];
    $id_teater = $_POST['id_teater'];
    $date = $_POST['date'];
    $status_order = 'Belum Bayar';

    $sql = "INSERT INTO `order` (`id_order`, `date`, `id_user`, `id_schedule`, `id_teater`, `status_order`, `Total`) 
            VALUES (NULL, '$date', '$id_user', '$id_schedule', '$id_teater', '$status_order', '$total');";
    $querry = mysqli_query($conn, $sql);

    $sql = "SELECT id_order FROM `order` order by id_order desc limit 1";
    $order =  mysqli_query($conn, $sql);

    foreach ($order as $key) {
        $id_order = $key['id_order'];

        $order = mysqli_query($conn, $sql);
        foreach ($seat as $index => $value) {
            $sql = "INSERT INTO `detail_order` VALUES (NULL, '$id_order', '$value', '$price','Booking');";
            $detail_order =  mysqli_query($conn, $sql);
        }
    }
    if ($order && $seat && $detail_order) {
        echo "
		<script>
				alert('Transaksi Berhasil');
				window.location.href='transaksi.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Transaksi Gagal,Periksa Kembali');
			window.location.href='confirm_order.php';
		</script>";
    }
} elseif (isset($_GET['pesan'])) {

    if ($_GET['pesan'] == 'bayar') {

        $id_order = $_GET['id_order'];
        $total = $_POST['total'];
        $saldo = $_SESSION['saldo'];
        $id_user = $_SESSION['id_user'];

        $sisa_saldo = $saldo - $total;

        $sql = "SELECT order.date FROM `order` 
                WHERE id_order = $id_order";
        $cek_date = mysqli_query($conn, $sql);

        $date_order = mysqli_fetch_array($cek_date);
        $date = $date_order['date'];

        $sql = "SELECT saldo,id_user FROM user Where id_user = 5";
        $manager =  mysqli_query($conn, $sql);

        $data_manager = mysqli_fetch_array($manager);
        $saldo_manager = $data_manager['saldo'];

        $total_saldo_manager = $saldo_manager + $total;

        $date_kode = str_replace("-", "", $date);
        $kode_trx = "1933" . $date_kode . $id_user . $id_order;

        $bilangan_acak = '';

        for ($i = 0; $i < 6; $i++) {
            $bilangan_acak .= mt_rand(0, 9);
        }
        $sql = "INSERT INTO trx
                VALUES ('$kode_trx', '$id_order', '$bilangan_acak','Belum Di Cetak');";
        $create_trx =  mysqli_query($conn, $sql);

        $sql = "SELECT status_kursi,id_detail_order FROM detail_order Where id_order = $id_order";
        $cek_kursi =  mysqli_query($conn, $sql);

        foreach ($cek_kursi as $key) {
            $id_detail_order = $key['id_detail_order'];

            $sql = "UPDATE `detail_order` SET `status_kursi` = 'Terisi' WHERE `detail_order`.`id_detail_order` = $id_detail_order;";
            $seat =  mysqli_query($conn, $sql);
        }
        $sql = "UPDATE `user` SET `saldo` = '$total_saldo_manager' WHERE `user`.`id_user` = 5;";
        $upt_saldo_manager =  mysqli_query($conn, $sql);

        $sql = "UPDATE `user` SET `saldo` = '$sisa_saldo' WHERE `user`.`id_user` = $id_user;";
        $upt_saldo_user =  mysqli_query($conn, $sql);

        $sql = "UPDATE `order` SET `status_order` = 'Sudah Di Bayar' WHERE `order`.`id_order` = $id_order;";
        $order =  mysqli_query($conn, $sql);

        if ($upt_saldo_manager && $upt_saldo_user && $order) {
            echo "
            <script>
            alert('Pembayaran Berhasil');
            window.location.href='riwayat.php';
        </script>";
        } else {
            echo "
            <script>
        	alert('Pembayaran Gagal');
        	window.location.href='transaksi_order.php';
            </script>";
        }
    } elseif ($_GET['pesan'] == 'hapus') {
        $id_order = $_GET['id_order'];

        $sql = "SELECT id_seat FROM detail_order Where id_order = $id_order";
        $order =  mysqli_query($conn, $sql);

        foreach ($order as $key) {
            $id_seat = $key['id_seat'];

            $sql = "UPDATE `seat` SET `status_seat` = 'Tersedia' WHERE `seat`.`id_seat` = $id_seat;";
            $seat =  mysqli_query($conn, $sql);

            $sql = "DELETE FROM detail_order WHERE id_order = $id_order";
            $detail_order =  mysqli_query($conn, $sql);
        }
        $sql = "DELETE FROM `order` WHERE `order`.`id_order` = $id_order";
        $hapus_order =  mysqli_query($conn, $sql);
        if ($hapus_order && $order) {
            echo "
            <script>
            window.location.href='transaksi.php';
    	</script>";
        } else {
            echo "
            <script>
    		window.location.href='transaksi_order.php';
            </script>";
        }
    }
}
