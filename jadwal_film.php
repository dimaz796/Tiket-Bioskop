<?php
include "navbar.php";


$id_film = $_GET['id_film'];

date_default_timezone_set("Asia/Jakarta");
$jam = date('Y-m-d H:i:s');
$tanggal = date('Y-m-d');
$result = mysqli_query($conn, "SELECT *
    FROM `film`
    INNER JOIN `dimension` 
    ON film.id_dimension=dimension.id_dimension
    INNER JOIN `schedule` 
    ON film.id_film=schedule.id_film 
    WHERE film.id_film=$id_film AND schedule.date = '$tanggal'
    ORDER BY schedule.clock ASC");
$count = mysqli_num_rows($result);

while ($film_data = mysqli_fetch_array($result)) {
    $title = $film_data['title'];
    $image = $film_data['image'];
    $age = $film_data['category_age'];
    $genre = $film_data['id_genre'];
    $dimension = $film_data['name_dimension'];
    $durasi = $film_data['durasi'];
    $price = $film_data['price'];
    $id_schedule = $film_data['id_schedule'];
    $day = $film_data['day'];
}
$dateDmy = date("d-m-Y", strtotime($tanggal));
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Film</title>
</head>

<body class="body">
    <div class="container d-flex justify-content-center align-items-center min-vh-80 mt-5">
        <div class="row rounded-4 p-4  bg-dark shadow box-area ">
            <div class="col-6 ">
                <img src="./assets/img/film/<?= $image ?>" class="pb-2" style="width: 80%;">
            </div>
            <div class="col-6 mt-5">
                <?php if ($count < 1) {
                    echo "
                    <script>
                    alert('Admin Belum Menambahkan Jadwal Di Film Ini,Coba Lagi Nanti');
                    window.location.href='detail_film.php?id_film=$id_film';
                    </script>";
                    die;
                } ?>
                <div class="d-flex">
                    <div class="kotak text-start"><?= $dimension ?></div>
                    <p class="bulet span text-start ms-3 p-2 fw-semibold"><?= $age ?></p>
                </div>
                <div class="fs-5 mb-4"><i class="bi bi-stopwatch"> </i> <?= $durasi ?> Menit</div>
                <label class="fs-3"><?= $day ?> <label class="fs-5" style="color: gray;"><?= $dateDmy ?></label>
                </label><br>
                <?php foreach ($result as $key) :
                    $sql = "SELECT count(*) as total_seat FROM `seat` WHERE id_teater = '$key[id_teater]' AND `status_seat` = 'Kosong'";
                    $seat = mysqli_query($conn, $sql);
                    $row = $seat->fetch_assoc();
                    $total_seat = $row['total_seat'];

                    if ($key['clock'] >= $jam && $total_seat > 1) :
                        if (isset($_SESSION['id_role'])) {
                            $status = "tiket.php?id_film=$id_film&time=" . $key['clock'] . "&id_schedule=" . $key['id_schedule'];
                        } else {
                            $status = "login.php?pesan=belum_login";
                        } ?>
                        <a href="<?= $status ?>" class="btn btn-dark btn-jadwal mt-3">
                            <?php $clock = substr($key['clock'], 0, -3);
                            $clock = substr($clock, 11);
                            echo $clock; ?></a>
                    <?php else :
                    ?>
                        <a href="#" type="button" class="btn btn-secondary mt-3" disabled style="width: 100px
                                ;">
                            <?php $clock = substr($key['clock'], 0, -3);
                            $clock = substr($clock, 11);
                            echo $clock; ?>
                        </a></a>
                <?php
                    endif;
                endforeach ?>
                <p class="fw-semibold fs-5 mt-3">Rp.<?= number_format($price) ?></p>
            </div>
            <!-- Foto Penutup -->

        </div>
    </div>

    </div>
</body>

</html>