<?php
include "navbar.php";

$id_film = $_GET['id_film'];
$result = mysqli_query($conn, "SELECT *
    FROM `film`
    INNER JOIN `dimension` 
    ON film.id_dimension=dimension.id_dimension
    WHERE id_film=$id_film
    ORDER BY film.id_film ASC");

while ($film_data = mysqli_fetch_array($result)) {
    $title = $film_data['title'];
    $image = $film_data['image'];
    $age = $film_data['category_age'];
    $genre = $film_data['id_genre'];
    $dimension = $film_data['name_dimension'];
    $trailer = $film_data['trailer'];
    $description = $film_data['description'];
    $producer    = $film_data['producer'];
    $directur    = $film_data['directur'];
    $writer = $film_data['writer'];
    $distributor = $film_data['distributor'];
    $durasi = $film_data['durasi'];
    $actor = $film_data['actor'];
    $update_at = $film_data['update_at'];
    $tayang = $film_data['tayang'];
    $berakhir = $film_data['berakhir'];
    $status_film = $film_data['status_film'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Film</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row rounded-4 p-4  bg-dark shadow box-area mb-5 mt-5">
            <!-- Header Pembuka -->
            <div class="col-1">
                <div class="bulet text-start p-4 mt-2 fw-semibold"><?= $age ?></div>
            </div>
            <div class="col-10 ms-3">
                <div class="fs-4 fw-semibold ms-3"><?= $title ?></div>
                <div class="fs-5 fw-medium ms-3 text-secondary">
                    <?php
                    $genres = explode(',', $genre);
                    foreach ($genres as $index => $genre) {
                        $sql = "SELECT name_genre FROM genre WHERE id_genre = '$genre'";

                        $result = mysqli_query($conn, $sql);
                        foreach ($result as $r) {
                            echo $r['name_genre'] . ($index != count($genres) - 1 ? ", " : '');
                        }
                    }

                    ?>
                </div>
            </div>
            <!-- Header Penutup -->
            <!-- Foto Pembuka -->
            <div class="col-6 mt-3">
                <img src="./assets/img/film/<?= $image ?>" class="p-3" style="width: 100%;">
            </div>
            <div class="col-6 mt-5">
                <div class="fs-5 mb-4"><i class="bi bi-stopwatch"> </i> <?= $durasi ?> Menit</div>
                <div class="kotak text-start p-3 fs-6 fw-medium mb-4"><?= $dimension ?></div>
                <?php if ($status_film == 'Akan Datang') : ?>
                    <button class="btn btn-warning btn-lg btn-size btn-sm fs-6 fw-medium mb-4" style="width: 70%;" disabled>Beli Tiket</button>
                <?php else : ?>
                    <a href="jadwal_film.php?id_film=<?= $id_film ?>" class="btn btn-warning btn-size btn-lg btn-sm fs-6 fw-medium mb-4" style="width: 70%;" id="jadwal_film"> Beli Tiket</a>
                <?php endif ?>
                <a href="<?= $trailer ?>" class="btn btn-warning btn-size btn-lg btn-sm fs-6 fw-medium" style="width: 70%;">Trailer</a>
            </div>
            <!-- Foto Penutup -->
            <!-- Keterangan Pembuka -->
            <div class="col-12 fs-5 fw-medium mt-4">Deskripsi</div>
            <div class="col-12 fs-6 text-secondary mt-2"> <?= $description ?></div>

            <div class="col-12 fs-5 fw-medium mt-4">Produser</div>
            <div class="col-12 fs-6 text-secondary mt-1"> <?= $producer ?></div>

            <div class="col-12 fs-5 fw-medium mt-4">Direktur</div>
            <div class="col-12 fs-6 text-secondary mt-1"> <?= $directur ?></div>

            <div class="col-12 fs-5 fw-medium mt-4">Penulis</div>
            <div class="col-12 fs-6 text-secondary mt-1"> <?= $writer ?></div>

            <div class="col-12 fs-5 fw-medium mt-4">Pemeran</div>
            <div class="col-12 fs-6 text-secondary mt-1"> <?= $actor ?></div>

            <div class="col-12 fs-5 fw-medium mt-4">Distributor</div>
            <div class="col-12 fs-6 text-secondary mt-1"> <?= $distributor ?></div>
            <!-- Keterangan Penutup -->
        </div>
    </div>
</body>

</html>