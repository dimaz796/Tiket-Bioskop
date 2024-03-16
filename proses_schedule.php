<?php
include 'conn.php';

if (isset($_POST['simpan'])) {
    if ($_POST['date'] . " " . $_POST['jam'] < date('Y-m-d H:i')) {
        echo "
		<script>
                alert('Waktu Sudah Terlewati,Input Dengan Benar!');
				window.location.href='tambah_schedule.php';
		</script>";
        die;
    }

    $id_film = $_POST['film'];

    $sql = "SELECT durasi,title,berakhir FROM `film` WHERE id_film = $id_film";
    $query = mysqli_query($conn, $sql);
    $row = $query->fetch_assoc();
    $durasi = $row['durasi'];
    $berakhir_film = $row['berakhir'];
    $judul_film = $row['title'];
    // Membuat Kondisi Jika Data Tayang Baru Melebihi Batas Waktu Berakhir Film
    $date = $_POST['date'];
    if ($date > $berakhir_film) {
        $tanggal = date("d F Y", strtotime($berakhir_film));
        echo "
         <script>
                 alert('Waktu Jadwal Melebihi Tanggal Film Berakhir Yaitu Dengan Judul $judul_film Berakhir Tanggal $tanggal');
                 window.location.href='tambah_schedule.php';
         </script>";
        die;
    }

    $day = $_POST['hari'];
    $clock_new =  $date . " " . $_POST['jam'];
    $id_teater = $_POST['teater'];

    // Menentukan Harga
    $sql = "SELECT price FROM `price`
    WHERE `day` = '$day'";
    $cp = mysqli_query($conn, $sql);
    $data_price = mysqli_fetch_assoc($cp);
    $price = $data_price['price'];

    // Merubah Tanggal Menjadi Menit 
    $timestamp = strtotime($clock_new);
    $clock_new = round($timestamp / 60);

    $clock_end_new = $clock_new + $durasi;


    $sql = "SELECT * FROM `schedule` WHERE date = '$date' AND id_teater = '$id_teater'";
    $jadwal = mysqli_query($conn, $sql);

    foreach ($jadwal as $schedule) {
        // Menganbil Data Dari Jadwal
        $clock = $schedule['clock'];
        $id_judul_film = $schedule['id_film'];

        // Mengambil Data Film 
        $sql = "SELECT title FROM `film` WHERE id_film = $id_judul_film";
        $query = mysqli_query($conn, $sql);
        $row = $query->fetch_assoc();
        $title = $row['title'];

        // Membuat Waktu Mulai Yang Sudah Ada Menjadi Menit
        $timestamp = strtotime($clock);
        $clock = round($timestamp / 60);

        // Membuat Waktu Berakhir Yang Sudah Ada Menjadi Menit
        $clock_end = $schedule['clock_end'];
        $timestamp = strtotime($clock_end);
        $clock_end = round($timestamp / 60);

        if (($clock_new >= $clock && $clock_end_new <= $clock_end) || ($clock_end_new >= $clock && $clock_new <= $clock_end)) {

            // Merubah Menit Menjadi Tanggal Jam Lama
            $timestamp = $clock * 60;
            $clock = date("Y-m-d H:i:s", $timestamp);

            // Merubah Menit Menjadi Tanggal Jam Lama
            $timestamp = $clock_end * 60;
            $clock_end = date("Y-m-d H:i:s", $timestamp);

            // Menbuat tanggal menjadi melihat jamnya saja
            $clock = substr($clock, 0, -3);
            $clock = substr($clock, 11);

            $clock_end = substr($clock_end, 0, -3);
            $clock_end = substr($clock_end, 11);

            echo "
            <script>
            alert('Jadwal Di Teater Tersebut Sudah DI Isi Oleh Film $title, Dari Jam $clock Dan Berakhir Jam $clock_end');
            window.location.href='tambah_schedule.php';
            </script>";
            die;
        }
    }

    // Merubah Menit Menjadi Tanggal 
    $timestamp = $clock_end_new * 60;
    $clock_end_new = date("Y-m-d H:i:s", $timestamp);

    // Merubah Menit Menjadi Tanggal 
    $timestamp = $clock_new * 60;
    $clock_new = date("Y-m-d H:i:s", $timestamp);

    $sql = "INSERT INTO `schedule` 
            VALUES (NULL, '$date', '$day', '$clock_new', '$clock_end_new', '$price', '$id_film', '$id_teater');";
    $create_schedule = mysqli_query($conn, $sql);

    if ($create_schedule) {
        echo "
    	<script>
    			alert('Data Jadwal Berhasil di simpan');
    			window.location.href='master_schedule.php';
    	</script>";
    } else {
        echo "
    	<script>
    		alert('Data Jadwal Gagal di Simpan');
    		window.location.href='tambah_schedule.php';
    	</script>";
    }
} elseif (isset($_POST['ubah'])) {
    $id_schedule = $_POST['id'];
    if ($_POST['date'] . " " . $_POST['jam'] < date('Y-m-d H:i')) {
        echo "
		<script>
                alert('Waktu Sudah Terlewati,Input Dengan Benar!');
				window.location.href='edit_schedule.php?id=$id_schedule';
		</script>";
        die;
    }

    // Mengambil Data Order
    $sql = "SELECT * FROM `order` 
            INNER JOIN schedule ON `order`.id_schedule = schedule.id_schedule
            WHERE `order`.id_schedule = $id_schedule;";
    $cek_order = mysqli_query($conn, $sql);
    $count_order = mysqli_fetch_assoc($cek_order);
    if ($count_order > 0) {
        echo "
		<script>
                alert('Sudah Ada Yang Memesan di jadwal ini,Data Jadwal Tidak Dapat Di Ubah');
				window.location.href='edit_schedule.php?id=$id_schedule';
		</script>";
        die;
    }

    $id_film = $_POST['film'];
    $sql = "SELECT durasi,title,berakhir FROM `film` WHERE id_film = $id_film";
    $query = mysqli_query($conn, $sql);
    $row = $query->fetch_assoc();
    $durasi = $row['durasi'];
    $berakhir_film = $row['berakhir'];
    $judul_film = $row['title'];
    // Membuat Kondisi Jika Data Tayang Baru Melebihi Batas Waktu Berakhir Film
    $date = $_POST['date'];
    if ($date > $berakhir_film) {
        $tanggal = date("d F Y", strtotime($berakhir_film));
        echo "
         <script>
                 alert('Waktu Jadwal Melebihi Tanggal Film Berakhir , Yaitu Dengan Judul $judul_film Berakhir Tanggal $tanggal');
                 window.location.href='edit_schedule.php?id=$id_schedule';
         </script>";
        die;
    }


    $date = $_POST['date'];
    $day = $_POST['hari'];
    $clock_new =  $date . " " . $_POST['jam'];
    $id_teater = $_POST['teater'];
    $clock_lama = $date . " " . $_POST['clock_lama'];


    $sql = "SELECT price FROM `price`
    WHERE `day` = '$day'";
    $cp = mysqli_query($conn, $sql);
    $data_price = mysqli_fetch_assoc($cp);
    $price = $data_price['price'];


    $timestamp = strtotime($clock_new);
    $clock_new = round($timestamp / 60);

    $timestamp = strtotime($clock_lama);
    $clock_lama = round($timestamp / 60);


    $clock_end_new = $clock_new + $durasi;


    $sql = "SELECT * FROM `schedule` WHERE date = '$date' AND id_teater = '$id_teater'";
    $jadwal = mysqli_query($conn, $sql);

    if ($clock_lama != $clock_new) {

        foreach ($jadwal as $schedule) {
            // Menganbil Data Dari Jadwal
            $clock = $schedule['clock'];
            $id_judul_film = $schedule['id_film'];

            // Mengambil Data Film 
            $sql = "SELECT title FROM `film` WHERE id_film = $id_judul_film";
            $query = mysqli_query($conn, $sql);
            $row = $query->fetch_assoc();
            $title = $row['title'];

            // Membuat Waktu Mulai Yang Sudah Ada Menjadi Menit
            $timestamp = strtotime($clock);
            $clock = round($timestamp / 60);

            // Membuat Waktu Berakhir Yang Sudah Ada Menjadi Menit
            $clock_end = $schedule['clock_end'];
            $timestamp = strtotime($clock_end);
            $clock_end = round($timestamp / 60);


            if (($clock_new >= $clock && $clock_end_new <= $clock_end) || ($clock_end_new >= $clock && $clock_new <= $clock_end)) {

                // Merubah Menit Menjadi Tanggal Jam Lama
                $timestamp = $clock * 60;
                $clock = date("Y-m-d H:i:s", $timestamp);

                // Merubah Menit Menjadi Tanggal Jam Lama
                $timestamp = $clock_end * 60;
                $clock_end = date("Y-m-d H:i:s", $timestamp);

                // Menbuat tanggal menjadi melihat jamnya saja
                $clock = substr($clock, 0, -3);
                $clock = substr($clock, 11);

                $clock_end = substr($clock_end, 0, -3);
                $clock_end = substr($clock_end, 11);

                echo "
            <script>
            alert('Jadwal Di Teater Tersebut Sudah DI Isi Oleh Film $title, Dari Jam $clock Dan Berakhir Jam $clock_end');
            window.location.href='edit_schedule.php?id=$id_schedule';
            </script>";
                die;
            }
        }
    }


    // Merubah Menit Menjadi Tanggal 
    $timestamp = $clock_end_new * 60;
    $clock_end_new = date("Y-m-d H:i:s", $timestamp);

    // Merubah Menit Menjadi Tanggal 
    $timestamp = $clock_new * 60;
    $clock_new = date("Y-m-d H:i:s", $timestamp);

    $sql = "UPDATE `schedule` SET `date` = '$date', `day` = '$day', `clock` = '$clock_new', 
            `clock_end` = '$clock_end_new', `price` = '$price', `id_film` = '$id_film', `id_teater` = '$id_teater' 
            WHERE `schedule`.`id_schedule` = $id_schedule;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "
    	<script>
    			alert('Data Jadwal Berhasil diubah');
    			window.location.href='master_schedule.php';
    	</script>";
    } else {
        echo "
    	<script>
    		alert('Data Jadwal Gagal diubah');
    		window.location.href='master_schedule.php';
    	</script>";
    }
} else {
    $id = $_GET['id'];

    // Cek Order
    $sql = "SELECT * FROM `order` 
    INNER JOIN schedule ON `order`.id_schedule = schedule.id_schedule
    WHERE `order`.id_schedule = $id;";
    $cek_order = mysqli_query($conn, $sql);
    $count_order = mysqli_fetch_assoc($cek_order);
    if ($count_order > 0) {
        echo "
        <script>
                alert('Sudah Ada Yang Memesan di jadwal ini,Data Jadwal Tidak Dapat Di Hapus');
                window.location.href='master_schedule.php?id=$id';
        </script>";
        die;
    }

    // Hapus Schedule
    $sql = "DELETE FROM `schedule` WHERE id_schedule=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
    	<script>
    			alert('Data Schedule Berhasil di Hapus');
    			window.location.href='master_schedule.php';
    	</script>";
    } else {
        echo "
    	<script>
    		alert('Data Schedule Gagal di Hapus');
    		window.location.href='master_schedule.php';
    	</script>";
    }
}
