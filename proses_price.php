<?php
include 'conn.php';

if (isset($_POST['simpan'])) {

    $price = $_POST['price'];
    $day = $_POST['day'];

    if ($price < 0) {
        echo "
		<script>
        alert('Harga Tidak Sah');
        window.location.href='tambah_price.php';
		</script>";
        die;
    }

    // Cek Hari Apakah Sudah Terisi
    $sql = "SELECT day FROM `price` WHERE day = '$day'";
    $cek_hari = mysqli_query($conn, $sql);
    $count_hari = mysqli_num_rows($cek_hari);
    if ($count_hari > 0) {
        echo "
		<script>
        alert('Data Hari Sudah Terpakai');
        window.location.href='tambah_price.php';
		</script>";
        die;
    }

    $sql = "INSERT INTO `price` VALUES ('$day','$price');";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "
		<script>
				alert('Data Harga Berhasil di simpan');
				window.location.href='master_price.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Harga Gagal di Simpan');
			window.location.href='tambah_price.php';
		</script>";
    }
} elseif (isset($_POST['ubah'])) {

    $price = $_POST['price'];
    $day = $_POST['day'];

    if ($price < 0) {
        echo "
            <script>
            alert('Harga Tidak Sah');
            window.location.href='edit_price.php?day=$day';
            </script>";
        die;
    }
    $result = mysqli_query($conn, "UPDATE `price` SET `price` = '$price' WHERE `price`.`day` = '$day'");

    if ($result) {
        echo "
		<script>
				alert('Data Harga Berhasil diubah');
				window.location.href='master_price.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Harga Gagal diubah');
			window.location.href='edit_price.php?id=$id_price';
		</script>";
    }
} else {

    $day = $_GET['day'];

    //Cek Transaksi Topup 
    $sql = "SELECT * FROM `schedule` 
    WHERE `schedule`.`day` = '$day'";
    $cek_price = mysqli_query($conn, $sql);

    $count_price = mysqli_fetch_assoc($cek_price);
    if ($count_price > 0) {
        echo "
        <script>
                alert('Sudah Ada Jadwal Yang Menggunakan Harga ini,Data Harga Tidak Dapat Di Hapus');
                window.location.href='master_price.php?id=$day';
        </script>";
        die;
    }
    $sql = "DELETE FROM price WHERE `price`.`day` = '$day'";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
		<script>
				alert('Data Harga Berhasil di Hapus');
				window.location.href='master_price.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Harga Berhasil di Hapus');
			window.location.href='master_price.php';
		</script>";
    }
}
