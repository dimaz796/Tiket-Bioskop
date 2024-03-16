<?php
include 'conn.php';

if (isset($_POST['simpan'])) {


    $nama = $_POST['nama'];
    $sql = "INSERT INTO `dimension` VALUES ('', '$nama');";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "
		<script>
				alert('Data dimension Berhasil di simpan');
				window.location.href='master_dimension.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data dimension Gagal di Simpan');
			window.location.href='tambah_dimension.php';
		</script>";
    }
} elseif (isset($_POST['ubah'])) {

    $id_dimension = $_POST['id_dimension'];
    $nama = $_POST['nama'];
    $result = mysqli_query($conn, "UPDATE `dimension` SET `name_dimension` = '$nama' WHERE `id_dimension` = $id_dimension");

    if ($result) {
        echo "
		<script>
				alert('Data dimension Berhasil diubah');
				window.location.href='master_dimension.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data dimension Gagal diubah');
			window.location.href='master_dimension.php';
		</script>";
    }
} else {

    $id_dimension = $_GET['id'];

    $sql = "SELECT * FROM `film` 
            WHERE `film`.id_dimension = $id_dimension;";
    $cek_dimension = mysqli_query($conn, $sql);

    $count_dimension = mysqli_fetch_assoc($cek_dimension);
    if ($count_dimension > 0) {
        echo "
        <script>
                alert('Sudah Ada Film Yang Menggunakan Dimension ini,Data Dimenison Tidak Dapat Di Hapus');
                window.location.href='master_dimension.php?id=$id_dimension';
        </script>";
        die;
    }
    $sql = "DELETE FROM `dimension` WHERE id_dimension=$id_dimension";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
		<script>
				alert('Data dimension Berhasil di Hapus');
				window.location.href='master_dimension.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data dimension Berhasil di Hapus');
			window.location.href='master_dimension.php';
		</script>";
    }
}
