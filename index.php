<?php
include "navbar.php";
include "conn.php";
if (isset($_SESSION['id_role'])) {
    if ($_SESSION['id_role'] == 3) {
        $status = 'jadwal_film.php';
    } else {
        $status = 'detail_film.php';
    }
} else {
    $status = 'detail_film.php';
}
$sql = "SELECT film.id_film,film.title,film.category_age,film.image,film.id_genre,film.status_film,film.tayang,film.berakhir FROM `film`
INNER JOIN dimension 
ON dimension.id_dimension = film.id_dimension
INNER JOIN genre 
ON genre.id_genre = film.id_genre
WHERE film.status_film = 'Berlangsung'
ORDER BY film.berakhir DESC
";
$querry = mysqli_query($conn, $sql);

$sql = "SELECT * FROM `film`
ORDER BY id_film ASC";
$cekfilm = mysqli_query($conn, $sql);

foreach ($cekfilm as $isi) {
    $id_film = $isi['id_film'];
    $tayang = $isi['tayang'];
    $berakhir = $isi['berakhir'];
    if (date("Y-m-d") < $tayang) {
        $status_film = "Akan Datang";
    } elseif (date("Y-m-d") > $berakhir) {
        $status_film = "Berakhir";
    } else {
        $status_film = "Berlangsung";
    }
    $sql = "UPDATE `film` SET `status_film` = '$status_film' WHERE `film`.`id_film` = $id_film;";
    $upt_film = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Home</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 ">
                <div id="carouselExampleControlsNoTouching" class="carousel slide mb-5" data-bs-touch="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/img/corousel1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/corousel2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/corousel3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Daftar Film -->
        <div class="row pb-5">
            <?php foreach ($querry as $row) : ?>
                <div class="col-md-3 col-sm-4 col-6">
                    <div class="card card-transparent shadow-lg bg-body-dark rounded mt-4 border border-dark" style="height: 95%;overflow: hidden;">
                        <a href="<?= $status . '?id_film=' . $row['id_film'] ?> "><img src="./assets/img/film/<?= $row['image'] ?>" class="card-img-top w-100 p-3 rounded" style="height: 30rem;overflow: hidden;"></a>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <label class="fs-4 fw-semibold"><?= $row['title'] ?></label>
                                    <p><?php
                                        $genres = explode(',', $row['id_genre']);
                                        foreach ($genres as $index => $genre) {
                                            $sql = "SELECT name_genre FROM genre WHERE id_genre = '$genre'";

                                            $result = mysqli_query($conn, $sql);
                                            foreach ($result as $r) {
                                                echo $r['name_genre'] . ($index != count($genres) - 1 ? ", " : '');
                                            }
                                        }

                                        ?></p>
                                </div>

                                <div class="bg-warning rounded p-3 kotak" style="color: black;"><?= $row['category_age'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <!-- Daftar Film -->
    </div>
    <?php include "assets/Footer/footer.php" ?>
</body>

</html>