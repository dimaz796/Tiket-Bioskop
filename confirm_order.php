    <?php
    include "navbar.php";

    if ((!isset($_SESSION['id_role'])) || ($_SESSION['id_role'] == 1) || ($_SESSION['id_role'] == 2)) {
        echo "
        <script>
        window.location.href='login.php?pesan=kemana';
       </script>";
    }
    if (isset($_POST['pesan'])) :
        $id_film = $_POST['id_film'];
        $id_schedule = $_POST['id_schedule'];
        $id_teater = $_POST['id_teater'];
        $tiket = $_POST['tiket'];
        $seat = $_POST['seat'];


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
            $id_film = $film_data['id_film'];
            $title = $film_data['title'];
            $image = $film_data['image'];
            $price = $film_data['price'];
            $name_teater = $film_data['name_teater'];
            $id_teater = $film_data['id_teater'];
            $clock = $film_data['clock'];
            $day = $film_data['day'];
            $date = $film_data['date'];
        }
        $dateDmy = date("d-m-Y", strtotime($date));
        $datenow = date("Y-m-d")
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Konfirmasi Order</title>
        </head>

        <body class="body">
            <div class="container d-flex justify-content-center align-items-center min-vh-80 mt-5 mb-5">
                <div class="row rounded-4 p-4  bg-dark shadow box-area ">
                    <div class="col-12">
                        <div class="fs-3 text-center fw-bold mb-5">KONFIRMASI PEMBAYARAN</div>
                    </div>
                    <div class="col-6 ">
                        <img src="./assets/img/film/<?= $image ?>" class="" style="width: 80%;">
                    </div>
                    <div class="col-6 mt-5">
                        <div class="fs-3 fw-semibold enter mb-3"><?= $title ?></div>
                        <div class="fs-5 fw-semibold">TANGGAL : <label class="fs-4 fw-medium"><?= $day ?> <label class="fs-5" style="color: gray;"><?= $dateDmy ?></label></div>
                        <div class="fs-5 fw-semibold">JAM : <label class="fs-5" style="color: gray;">
                                <?php $clock = substr($clock, 11);
                                $clock = substr($clock, 0, -3);
                                echo $clock; ?>
                            </label></div>
                        <div class="fs-5 fw-semibold">TEATER : <label class="fs-5" style="color: gray;"><?= $name_teater ?></label></div>
                    </div>
                    <!-- Kursi -->
                    <div class="col-4 mt-5">
                        <div class="fw-medium fs-4">Kursi</div>
                    </div>
                    <div class="col-8 mt-5">
                        <div class="fw-medium fs-5">
                            <?php foreach ($seat as $key => $value) {
                                echo ($key == count($seat) - 1) ? $value : $value . ',';
                            } ?>
                        </div>
                    </div>
                    <!-- Kursi -->
                    <!-- Harga -->
                    <div class="col-4">
                        <div class="fw-medium fs-5 mt-3">Harga Tiket</div>
                    </div>
                    <div class="col-4">
                        <div class="fw-medium fs-5 mt-3"><?= 'Rp' . ' ' . number_format($price) . ' ' . ' x ' . ' ' . $tiket ?></div>
                    </div>
                    <div class="col-4">
                        <div class="fw-medium fs-5 mt-3"><?= 'Rp' . ' ' . number_format($price * $tiket) ?></div>
                    </div>
                    <!-- Harga -->
                    <!-- Total -->
                    <div class="col-4">
                        <div class="fw-medium fs-5 mt-3">Total Pembayaran</div>
                    </div>
                    <div class="col-4">
                        <div class="fw-medium fs-5 mt-3"><br></div>
                    </div>
                    <div class="col-4">
                        <div class="fw-semibold fs-5 mt-3"><?= 'Rp' . ' ' . number_format($total =  $price * $tiket) ?></div>
                    </div>
                    <!-- Total -->
                    <div class="col-12 mt-5">
                        <form action="proses_transaksi.php" method="post">
                            <input type="hidden" name="id_film" value="<?= $id_film ?>">
                            <?php
                            foreach ($seat as $index => $seat) {
                                $variable =  substr($seat, 0, 1);
                                $number =  substr($seat, 1);
                                $sql = "SELECT id_seat FROM seat WHERE number_seat = '$number' AND variable_seat = '$variable' AND id_teater = '$id_teater'";

                                $result = mysqli_query($conn, $sql);
                                foreach ($result as $r) { ?>
                                    <input type="hidden" name="seat[]" value="<?= $r['id_seat'] ?>">
                            <?php
                                }
                            }
                            ?>
                            <input type="hidden" name="price" value="<?= $price ?>">
                            <input type="hidden" name="total" value="<?= $total ?>">
                            <input type="hidden" name="id_schedule" value="<?= $id_schedule ?>">
                            <input type="hidden" name="id_teater" value="<?= $id_teater ?>">
                            <input type="hidden" name="date" value="<?= $datenow ?>">
                            <div class="w-100 d-flex justify-content-center">
                                <button type="submit" name="pesan" onclick="updateTargetDate()" class="btn btn-dark border-light btn-sm mt-5 w-100 h-100 fs-5 text-center mb-5">Confirm Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        <?php
    endif ?>
        </body>
        <script>
            function updateTargetDate() {
                targetDate = new Date().getTime() + (3 * 60 * 1000); // Tambah 5 menit ke waktu saat ini
                localStorage.setItem('targetDate', targetDate); // Simpan waktu target di penyimpanan lokal
            }
        </script>

        </html>