<?php
include 'conn.php';

if (isset($_POST['simpan'])) {

    $price = $_POST['price'];
    $day = $_POST['day'];

    // Cek Hari Apakah Sudah Terisi
    $sql = "SELECT name_day FROM `price` WHERE name_day = '$day'";
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

    $sql = "INSERT INTO `price` VALUES (NULL, '$day','$price');";
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

    $id_price = $_POST['id_price'];
    $price = $_POST['price'];
    $day = $_POST['day'];
    $day_lama = $_POST['day_lama'];

    if ($day_lama != $day) {
        $sql = "SELECT name_day FROM `price` WHERE name_day = '$day'";
        $cek_hari = mysqli_query($conn, $sql);
        $count_hari = mysqli_num_rows($cek_hari);
        if ($count_hari > 0) {
            echo "
            <script>
            alert('Data Hari Sudah Terpakai');
            window.location.href='edit_price.php?id=$id_price';
            </script>";
            die;
        }
    }

    $result = mysqli_query($conn, "UPDATE `price` SET `name_day` = '$day', `price` = '$price' WHERE `price`.`id_price` = $id_price;");

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
    include 'connection.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM `role` WHERE id_role=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
		<script>
				alert('Data Role Berhasil di Hapus');
				window.location.href='master_role.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Role Berhasil di Hapus');
			window.location.href='master_role.php';
		</script>";
    }
}
