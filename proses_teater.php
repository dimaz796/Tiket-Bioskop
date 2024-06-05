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


    $id_teater = $_GET['id'];

    //Cek Transaksi Topup 
    $sql = "SELECT * FROM `seat` 
    WHERE `seat`.id_teater = $id_teater";
    $cek_kursi = mysqli_query($conn, $sql);
    $count_kursi = mysqli_fetch_assoc($cek_kursi);

    if ($count_kursi > 0) {
        echo "
        <script>
                alert('Sudah Ada Kursi Yang Menggunakan Teater ini,Data Teater Tidak Dapat Di Hapus');
                window.location.href='master_teater.php?id=$id_teater';
        </script>";
        die;
    }

    $sql = "SELECT * FROM `schedule` 
    WHERE `schedule`.id_teater = $id_teater";
    $cek_teater = mysqli_query($conn, $sql);
    $count_teater = mysqli_fetch_assoc($cek_teater);

    if ($count_teater > 0) {
        echo "
        <script>
                alert('Sudah Ada Jadwal Yang Menggunakan Teater ini,Data Teater Tidak Dapat Di Hapus');
                window.location.href='master_teater.php?id=$id_teater';
        </script>";
        die;
    }
    $sql = "DELETE FROM `teater` WHERE id_teater=$id_teater";
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
