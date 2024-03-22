<?php
include "navbar.php";
if ((!isset($_SESSION['id_role'])) || ($_SESSION['id_role'] == 1) || ($_SESSION['id_role'] == 2)) {
    echo "
    <script>
    window.location.href='login.php?pesan=kemana';
   </script>";
}
if ($_SESSION['id_role'] == 3 || $_SESSION['id_role'] == 4) :
    if (isset($_POST['beli'])) :
        $seat_kosong = $_POST['seat_kosong'];
        $tiket = $_POST['tiket'];
        $time = $_POST['time'];
        $time = substr($time, 11);
        $id_schedule = $_POST['id_schedule'];
        $id_film = $_POST['id_film'];
        $sql = "SELECT *
            FROM `film`
            INNER JOIN `dimension` 
            ON film.id_dimension=dimension.id_dimension
            INNER JOIN `schedule` 
            ON film.id_film=schedule.id_film 
            INNER JOIN `teater` 
            ON schedule.id_teater=teater.id_teater 
            WHERE film.id_film= $id_film AND schedule.id_schedule = $id_schedule
";
        $querry = mysqli_query($conn, $sql);
        while ($film_data = mysqli_fetch_array($querry)) {
            $title = $film_data['title'];
            $price = $film_data['price'];
            $teater = $film_data['name_teater'];
            $id_teater = $film_data['id_teater'];
            $clock = $film_data['clock'];
            $date = $film_data['date'];
        }
        $dateDmy = date("d-m-Y", strtotime($date));
        $sql1 = "SELECT * FROM seat WHERE id_teater = '$id_teater'";
        $seat = mysqli_query($conn, $sql1);
        if ($tiket > $seat_kosong) {
            echo "
            <script>
                    alert('Tiket Yang Di Beli Melebihi Batas Tersedia,Ulangi Lagi');
                    window.location.href='tiket.php?id_film=$id_film&time=$time&id_schedule=$id_schedule';
            </script>";
        } elseif ($tiket == '' || $tiket < 1) {
            echo "
            <script>
                    alert('Isi Jumlah Tiket Minimal 1');
                    window.location.href='tiket.php?id_film=$id_film&time=$time&id_schedule=$id_schedule';
            </script>";
        }
        foreach ($seat as $index2 => $st) {
            $arr_seat = $st['number_seat'];
        }
        $last_seat = $arr_seat;

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Memilih Kursi</title>
        </head>
        <style>
            main {
                margin-top: 50px;
                display: flex;
                justify-content: center;
            }

            table {
                border-collapse: collapse;
            }

            td {
                padding: 10px;
            }

            .button {
                padding: 10px 5px;
                width: 70px;
                background-color: #00e600;
                color: black;
                border: 0px;
                border-radius: 10px;
            }

            th {
                font-size: 12px;
            }

            td {
                font-size: 12px;
            }

            .tbl-container {
                max-width: fit-content;
                max-height: fit-content;

            }

            .tbl-fixed {
                overflow-y: scroll;
                overflow-x: scroll;
                height: fit-content;
                max-height: 80vh;
            }
        </style>

        <body class="body">
            <div class="container bg-container mt-5 p-5">

                <div class="row">
                    <div class="col-12">
                        <a href="jadwal_film.php?id_film=<?= $id_film ?>" class=" fs-6 tiket-x " style="text-decoration: none;">Kembali</a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="fs-6 ">Judul : <?= $title ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="fs-6">Kursi dipilih : <span id="kursi-yang-dipesan"> - </span></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="fs-6">Jumlah tiket : <span id="total-tiket-pesan">0</span>/<?= $tiket ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="fs-6">Studio : <?= $teater ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="fs-6">Date : <?= $dateDmy ?> ,Time : <?= substr($time, 0, -3) ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="fs-6">Total : Rp <?= number_format($price * $tiket) ?></label>
                    </div>
                </div>
                <div class="row mt-4 mb-4">
                    <div class="col-12">
                        <label style="width: 30px;background-color: #00e600; color:skyblue" class="rounded border border-light">.</label>
                        Tersedia

                        <label style="width: 30px; color:red" class="rounded border border-light bg-danger ms-4 mt-2">.</label>
                        Terisi

                        <label style="width: 30px; color:gray" class="rounded border border-light bg-secondary ms-4 mt-2">.</label>
                        Rusak

                        <label style="width: 30px; color:yellow" class="rounded border border-light bg-warning ms-4 mt-2">.</label>
                        <label class="me-4">Di Pilih</label>

                        <label style="width: 30px; color:skyblue" class="rounded border border-light bg-info mt-2">.</label>
                        Booking
                    </div>


                </div>
                <br>
                <center>

                    <form action="confirm_order.php" method="POST">
                        <div class="container tbl-container ">
                            <div class="row tbl-fixed">
                                <table class="table table-dark table-borderless">
                                    <?php
                                    foreach ($seat as $index2 => $st) :
                                        $isi = '';
                                        $id_seat = $st['id_seat'];
                                        $value = $st['variable_seat'] . $st['number_seat'];
                                        $status_seat = $st['status_seat'];
                                        $isi .= "<input type='checkbox' class='btn-check tiket' id='$id_seat' name='seat[]' value='$value' onclick='tambahTiket(this)' seat='$value'>";
                                        $sql = "SELECT * 
                                        FROM `order` 
                                        JOIN `detail_order` ON `order`.`id_order` = `detail_order`.`id_order` 
                                        WHERE `detail_order`.`id_seat` = $id_seat and `order` . `id_schedule` = $id_schedule";
                                        $cek_status = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($cek_status);
                                        if ($count > 0) {
                                            $cek = mysqli_fetch_array($cek_status);
                                            $status_seat = $cek['status_kursi'];
                                        }
                                        if ($status_seat == 'Rusak') {
                                            $status_seat = "btn-secondary";
                                            $keterangan = 'disabled';
                                        } elseif ($status_seat == 'Terisi') {
                                            $status_seat = "btn-danger";
                                            $keterangan = 'disabled';
                                        } elseif ($status_seat == 'Booking') {
                                            $status_seat = "btn-info";
                                            $keterangan = 'disabled';
                                        } else {
                                            $status_seat = "btn-warning";
                                            $keterangan = '';
                                        }
                                        $isi .= "<label class='btn $status_seat $keterangan button' for='$id_seat'>$value</label>";

                                        if ($st['number_seat'] == 1) {
                                            echo "<tr>
                                                <td>
                                                $isi
                                                </td>";
                                        } else if ($st['number_seat'] == $last_seat) {
                                            echo "<td>$isi</td></tr>";
                                        } else {
                                            if ($st['number_seat'] == intval(($last_seat / 2) + 1)) {
                                                echo "<td style='width:100%'></td>";
                                            }
                                            echo "<td>$isi</td>";
                                        }
                                    endforeach;
                                    ?>
                                </table>
                            </div>
                        </div>
                        <input type="hidden" name="id_film" value="<?= $id_film ?>">
                        <input type="hidden" name="id_schedule" value="<?= $id_schedule ?>">
                        <input type="hidden" name="id_teater" value="<?= $id_teater ?>">
                        <input type="hidden" name="tiket" value="<?= $tiket ?>">


                        <button type="submit" name="pesan" class="btn btn-warning btn-sm mt-5 w-25" id="button-pesan" disabled>Pesan</button>
                    </form>
                </center>

            </div>
            <div class="print-values">
                <p id="seatList"></p>
            </div>
            <script src="./assets/js/dimas.js"></script>
            <script>
                function tambahTiket(el) {
                    checked = el.checked


                    if (checked) {
                        el.classList.add('checked');
                    } else {
                        el.classList.remove('checked')
                    }

                    let checkedTiket = document.getElementsByClassName('checked')

                    if (checkedTiket.length > parseInt("<?= $tiket ?>")) {
                        el.classList.remove('checked')
                        el.checked = false
                        alert('Anda sudah melebihi tiket')
                    }

                    // kursiSekarang = el.value

                    // angkaKursiSekarang = kursiSekarang.split('')

                    // huruf = angkaKursiSekarang[0]
                    // angkaKursiSekarang.shift()

                    // angka = parseInt(angkaKursiSekarang.join(''))

                    // jumlahTiket = parseInt("<?= $tiket ?>")

                    // for (let i = angka; i < jumlahTiket; i++) {
                    //     document.querySelector(`[seat="${huruf + i}"]`).checked = true;
                    // }
                    jumlahTiketDiv = document.getElementById("total-tiket-pesan")
                    jumlahTiketDiv.innerHTML = checkedTiket.length

                    let html = ''
                    for (let i = 0; i < checkedTiket.length; i++) {
                        html += checkedTiket[i].value;

                        // Tambahkan tanda koma jika bukan elemen terakhir
                        if (i !== checkedTiket.length - 1) {
                            html += ', ';
                        }
                    }

                    document.getElementById('kursi-yang-dipesan').innerHTML = html

                    if (checkedTiket.length == "<?= $tiket ?>") {
                        document.getElementById('button-pesan').disabled = false
                    } else {
                        document.getElementById('button-pesan').disabled = true
                    }

                }
            </script>
        </body>

        </html>
<?php
    else :
        echo "
         <script>
         window.location.href='login.php?pesan=kemana';
		</script>";
    endif;
endif
?>