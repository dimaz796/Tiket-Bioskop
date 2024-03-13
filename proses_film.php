<?php
include 'conn.php';


if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $age = $_POST['age'];
    $genre = implode(',', $_POST['genre']);
    $dimension = $_POST['dimension'];
    $trailer = $_POST['trailer'];
    $deskripsi = $_POST['deskripsi'];
    $produser    = $_POST['produser'];
    $directur = $_POST['directur'];
    $writer    = $_POST['writer'];
    $distributor = $_POST['distributor'];
    $durasi = $_POST['durasi'];
    $pemeran = $_POST['pemeran'];
    $dibuat = $_POST['dibuat'];
    $diupdate = $_POST['diupdate'];
    $tayang = $_POST['tayang'];
    $berakhir = $_POST['berakhir'];
    if (date("Y-m-d h:i:sa") < $tayang) {
        $status = "Akan Datang";
    } elseif (date("Y-m-d h:i:sa") > $berakhir) {
        $status = "Berakhir";
    } else {
        $status = "Berlangsung";
    }

    $gambar = $_FILES['gambar']['name'];
    $lokasiGambar = $_FILES['gambar']['tmp_name'];

    if (strtotime($tayang) >= strtotime($berakhir)) {
        echo "<script>
        alert('Jadwal Tayang Tidak Sah');
        window.location.href='tambah_film.php';
    </script>";
    }

    $sql = "INSERT INTO `film` 
            VALUES (NULL, '$nama', '$gambar','$age', '$genre', '$dimension', '$trailer', '$deskripsi', '$produser','$directur','$writer','$distributor', 
                            '$pemeran', '$durasi', '$dibuat', '$diupdate', '$tayang', '$berakhir', '$status');";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        move_uploaded_file($lokasiGambar, 'assets/img/film/' . $gambar);
        echo "
		<script>
				alert('Data Film Berhasil di simpan');
				window.location.href='master_film.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Film Gagal di Simpan');
			window.location.href='tambah_film.php';
		</script>";
    }
} elseif (isset($_POST['ubah'])) {
    $id_film = $_POST['id'];
    $title = $_POST['title'];
    $age = $_POST['age'];
    $genre = implode(',', $_POST['genre']);
    $dimension = $_POST['dimension'];
    $trailer = $_POST['trailer'];
    $deskripsi = $_POST['deskripsi'];
    $produser    = $_POST['produser'];
    $directur = $_POST['directur'];
    $writer    = $_POST['writer'];
    $distributor = $_POST['distributor'];
    $durasi = $_POST['durasi'];
    $pemeran = $_POST['pemeran'];
    $diupdate = $_POST['diupdate'];
    $tayang = $_POST['tayang'];
    $berakhir = $_POST['berakhir'];
    if (date("Y-m-d h:i:sa") < $tayang) {
        $status = "Akan Datang";
    } elseif (date("Y-m-d h:i:sa") > $berakhir) {
        $status = "Berakhir";
    } else {
        $status = "Berlangsung";
    }
    $date = date("Y-m-d h:i:sa");
    $gambar = $_FILES['gambar']['name'];
    $lokasiGambar = $_FILES['gambar']['tmp_name'];

    if (strtotime($tayang) >= strtotime($berakhir)) {
        echo "<script>
        alert('Jadwal Tayang Tidak Sah');
        window.location.href='edit_film.php?id=$id_film';
    </script>";
    }

    if ($gambar == "") {
        $sql = "UPDATE `film` SET `title` = '$title', `category_age` = '$age', `id_genre` = '$genre', `id_dimension` = '$dimension', `trailer` = '$trailer',
                `description` = '$deskripsi', `producer` = '$produser', `directur` = '$directur', `writer` = '$writer', `distributor` = '$distributor',
                `actor` = 'Dimas,Adit,Tyas', `durasi` = '121',`update_at` = '$diupdate', 
                `tayang` = '$tayang', `berakhir` = '$berakhir', `status_film` = '$status' WHERE `film`.`id_film` = $id_film;";
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "UPDATE `film` SET `title` = '$title', `image` = '$gambar', `category_age` = '$age', `id_genre` = '$genre', `id_dimension` = '$dimension', `trailer` = '$trailer',
                `description` = '$deskripsi', `producer` = '$produser', `directur` = '$directur', `writer` = '$writer', `distributor` = '$distributor',
                `actor` = 'Dimas,Adit,Tyas', `durasi` = '121',`update_at` = '$diupdate', 
                `tayang` = '$tayang', `berakhir` = '$berakhir', `status_film` = '$status' WHERE `film`.`id_film` = $id_film;";
        $result = mysqli_query($conn, $sql);
    }


    if ($result) {
        echo "
		<script>
				alert('Data Film Berhasil diubah');
				window.location.href='master_film.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Film Gagal diubah');
			window.location.href='master_film.php';
		</script>";
    }
} else {
    $id_film = $_GET['id'];
    $sql = "DELETE FROM `film` WHERE id_film=$id_film";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
		<script>
				alert('Data Film Berhasil di Hapus');
				window.location.href='master_film.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Film Berhasil di Hapus');
			window.location.href='master_film.php';
		</script>";
    }
}
