<?php

include 'conn.php';

if (isset($_POST['simpan'])) {
    $abjad = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    $baris = $_POST['baris'];
    $kolom = $_POST['kolom'];
    $id_teater = $_POST['teater'];
    $status = 'Kosong';

    foreach ($abjad as $key => $value) {
        if ($baris == $value) {
            $huruf_baris = $value;
            $angka_baris = $key;
        }
    }
    $sql = "SELECT * FROM `seat` WHERE Id_teater = '$id_teater'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);


    if ($count > 0) {
        echo "
        <script>
            alert('Gagal!,Teater Tersebut Telah Di isi ');
            window.location.href='tambah_seat.php';
        </script>";
        die;
    }
    for ($i = 0; $i <= $angka_baris; $i++) {
        for ($j = 1; $j <= $kolom; $j++) {
            $sql = "INSERT INTO `seat`
                VALUES (NULL, '$j','$abjad[$i]', '$id_teater', '$status');";

            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo "
                    <script>
                            alert('Data Seat Berhasil di simpan');
                            window.location.href='master_seat.php';
                    </script>";
            } else {
                echo "
                    <script>
                        alert('Data Seat Gagal di Simpan');
                        window.location.href='tambah_seat.php';
                    </script>";
            }
        }
    }
} elseif (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $keterangan = $_POST['keterangan'];
    $seat = $_POST['seat'];

    foreach ($seat as $st => $value) {
        $first_variabe = substr($value, 0, 1);
        $remaining_variabe = substr($value, 1);

        $qry = "UPDATE `seat` SET `status_seat` = '$keterangan' 
                WHERE `seat`.`id_teater` = $id 
                AND `seat`.`number_seat`= $remaining_variabe 
                AND `seat`.`variable_seat`= '$first_variabe'";

        $result = mysqli_query($conn, $qry);
    }
    if ($result) {
        echo "
    	<script>
    			alert('Data Seat Berhasil diubah');
    			window.location.href='master_seat.php';
    	</script>";
    } else {
        echo "
    	<script>
    		alert('Data Seat Gagal diubah');
    		window.location.href='edit_seat.php';
    	</script>";
    }
} else {
    $id = $_GET['id'];


    //Cek Transaksi Topup 
    $sql = "SELECT * FROM `schedule` 
    WHERE id_teater = $id";
    $cek_teater = mysqli_query($conn, $sql);

    $count_teater = mysqli_fetch_assoc($cek_teater);
    if ($count_teater > 0) {
        echo "
        <script>
                alert('Sudah Ada Jadwal Yang Menggunakan Teater ini, Data Kursi Tidak Dapat Di Hapus');
                window.location.href='master_seat.php?';
        </script>";
        die;
    }

    $sql = "DELETE FROM `seat` WHERE id_teater=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
    	<script>
    			alert('Data Seat Berhasil di Hapus');
    			window.location.href='master_seat.php';
    	</script>";
    } else {
        echo "
    	<script>
    		alert('Data Seat Gagal di Hapus');
    		window.location.href='master_seat.php';
    	</script>";
    }
}
