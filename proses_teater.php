<?php
include 'conn.php';

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $sql = "INSERT INTO `teater` VALUES (NULL, '$nama');";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "
		<script>
				alert('Data Teater Berhasil di simpan');
				window.location.href='master_teater.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Teater Gagal di Simpan');
			window.location.href='tambah_teater.php';
		</script>";
    }
} elseif (isset($_POST['ubah'])) {

    $id_teater = $_POST['id_teater'];
    $nama = $_POST['nama'];
    $update = $_POST['update'];
    $result = mysqli_query($conn, "UPDATE `teater` SET `name_teater` = '$nama' WHERE `teater`.`id_teater` = $id_teater;");

    if ($result) {
        echo "
		<script>
				alert('Data Teater Berhasil diubah');
				window.location.href='master_teater.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Teater Gagal diubah');
			window.location.href='master_teater.php';
		</script>";
    }
} else {
    include 'connection.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM `teater` WHERE id_teater=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
		<script>
				alert('Data Teater Berhasil di Hapus');
				window.location.href='master_teater.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Teater Berhasil di Hapus');
			window.location.href='master_teater.php';
		</script>";
    }
}
