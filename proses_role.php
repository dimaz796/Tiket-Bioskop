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

    $id_role = $_GET['id'];

    $sql = "SELECT * FROM `user` 
            WHERE `user`.id_role = $id_role";
    $cek_role = mysqli_query($conn, $sql);

    $count_role = mysqli_fetch_assoc($cek_role);
    if ($count_role > 0) {
        echo "
        <script>
                alert('Sudah Ada User Yang Menggunakan Role ini,Data Role Tidak Dapat Di Hapus');
                window.location.href='master_role.php?id=$id_role';
        </script>";
        die;
    }

    $sql = "DELETE FROM `role` WHERE id_role=$id_role";
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
