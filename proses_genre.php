<?php
include 'conn.php';

if (isset($_POST['simpan'])) {


    $nama = $_POST['nama'];
    $sql = "INSERT INTO `genre` VALUES (NULL, '$nama');";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "
		<script>
				alert('Data genre Berhasil di simpan');
				window.location.href='master_genre.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data genre Gagal di Simpan');
			window.location.href='tambah_genre.php';
		</script>";
    }
} elseif (isset($_POST['ubah'])) {

    $id_genre = $_POST['id_genre'];
    $nama = $_POST['nama'];
    $result = mysqli_query($conn, "UPDATE `genre` SET `name_genre` = '$nama' WHERE `id_genre` = $id_genre");

    if ($result) {
        echo "
		<script>
				alert('Data genre Berhasil diubah');
				window.location.href='master_genre.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data genre Gagal diubah');
			window.location.href='master_genre.php';
		</script>";
    }
} else {
    include 'connection.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM `genre` WHERE id_genre=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
		<script>
				alert('Data genre Berhasil di Hapus');
				window.location.href='master_genre.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data genre Berhasil di Hapus');
			window.location.href='master_genre.php';
		</script>";
    }
}
