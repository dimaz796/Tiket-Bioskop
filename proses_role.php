<?php
include 'conn.php';

if (isset($_POST['simpan'])) {


    $nama = $_POST['nama'];
    $sql = "INSERT INTO `role` VALUES (NULL, '$nama');";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "
		<script>
				alert('Data Role Berhasil di simpan');
				window.location.href='master_role.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Role Gagal di Simpan');
			window.location.href='tambah_role.php';
		</script>";
    }
} elseif (isset($_POST['ubah'])) {

    $id_role = $_POST['id_role'];
    $nama = $_POST['nama'];
    $result = mysqli_query($conn, "UPDATE `role` SET `name_role` = '$nama' WHERE `id_role` = $id_role");

    if ($result) {
        echo "
		<script>
				alert('Data Role Berhasil diubah');
				window.location.href='master_role.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Role Gagal diubah');
			window.location.href='master_role.php';
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
