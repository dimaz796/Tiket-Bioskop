<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Film</title>
</head>

<body>
    <?php
    include "navbar.php";
    if ($_SESSION['id_role'] != 1) {
        echo "
             <script>
                window.location.href='login.php';
            </script>";
    }

    $sql = "SELECT * FROM `genre`";
    $genreS = mysqli_query($conn, $sql);
    $genreall = mysqli_fetch_all($genreS);

    $arr_age = ['SU', '13+', '17+', '21+'];

    $sql = "SELECT * FROM `dimension`";
    $dimensionS = mysqli_query($conn, $sql);
    $dimensionall = mysqli_fetch_all($dimensionS);

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM film WHERE id_film=$id");

    $sql = mysqli_query($conn, "SELECT * FROM film WHERE id_film = '$id'");
    $data_genre = mysqli_fetch_array($sql);
    $g = explode(',', $data_genre['id_genre']);

    while ($film_data = mysqli_fetch_array($result)) {
        $title = $film_data['title'];
        $image = $film_data['image'];
        $age = $film_data['category_age'];
        $genre = $film_data['id_genre'];
        $dimension = $film_data['id_dimension'];
        $trailer = $film_data['trailer'];
        $description = $film_data['description'];
        $producer    = $film_data['producer'];
        $distributor = $film_data['distributor'];
        $durasi = $film_data['durasi'];
        $actor = $film_data['actor'];
        $update_at = $film_data['update_at'];
        $directur = $film_data['directur'];
        $writer = $film_data['writer'];
        $tayang = $film_data['tayang'];
        $berakhir = $film_data['berakhir'];
    }


    ?>
    <div class="container mt-3">

        <div class="container">
            <form method="post" action="proses_film.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                <h1>Edit Film</h1>

                <label class="mb-3 ">Nama Film</label>
                <input type="text" name="title" class="form-control w-50 enter mb-4" value="<?= $title ?>" required>

                <label class="mb-3 ">Gambar Film</label>
                <input type="file" name="gambar" class="form-control w-50 enter mb-4" value="<?= $image ?>">

                <label class="mb-3 ">Kategori Umur</label>
                <select name="age" class="form-select w-50 h-50 enter mb-4 p-1" style="height: 25px; width: 610px;">
                    <?php foreach ($arr_age as $row => $value) : ?>
                        <option value="<?= $value ?>" class="bg-dark" <?= $select =  ($value == $age) ? 'selected' : ''  ?>><?= $value ?></option>
                    <?php endforeach ?>
                </select>

                <label class="mb-3 ">Genre</label>
                <div class="btn-group enter mb-4 p-1" role="group" aria-label="Basic checkbox toggle button group">
                    <?php foreach ($genreall as $row) : ?>
                        <input type="checkbox" class="btn-check" id="<?= $row[0] ?>" name="genre[]" value="<?= $row[0] ?>" <?= $check = (in_array($row[0], $g)) ? 'checked' : '' ?>>
                        <label class="btn btn-outline-warning" for="<?= $row[0] ?>"><?= $row[1] ?></label>
                    <?php if ($row[0] == 8) {

                            echo "<br>";
                        }
                    endforeach ?>
                </div>

                <label class="mb-3 ">Durasi</label>
                <input type="number" name="durasi" class="form-control w-50 enter mb-4" value="<?= $durasi ?>" required>

                <label class="mb-3 ">Dimensi</label>
                <select name="dimension" class="form-select w-50 h-50 enter mb-4 p-1" style="height: 25px; width: 610px;">
                    <?php foreach ($dimensionall as $row) : ?>
                        <option value="<?= $row[0] ?>" class="bg-dark" <?= $select = ($row[0] == $age) ? 'selected' : ''  ?>><?= $row[1] ?></option>
                    <?php endforeach ?>
                </select>

                <label class="mb-3 ">Link Trailer</label>
                <input type="text" name="trailer" class="form-control w-50 enter mb-4" value="<?= $trailer ?>" required>

                <label class="mb-3 ">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control w-50 enter mb-4" style="height: 100px;" value="<?= $description ?>" required>

                <label class="mb-3 ">Produser</label>
                <input type="text" name="produser" class="form-control w-50 enter mb-4" value="<?= $producer ?>" required>


                <label class="mb-3 ">Directur</label>
                <input type="text" name="directur" class="form-control w-50 enter mb-4" value="<?= $distributor ?>" required>

                <label class="mb-3 ">Penulis</label>
                <input type="text" name="writer" class="form-control w-50 enter mb-4" value="<?= $writer ?>" required>


                <label class="mb-3 ">Pemeran</label>
                <input type="text" name="pemeran" class="form-control w-50 enter mb-4" value="<?= $actor ?>" required>

                <label class="mb-3 ">Distributor</label>
                <input type="text" name="distributor" class="form-control w-50 enter mb-4" value="<?= $distributor ?>" required>

                <label class="mb-3 ">Tayang Tanggal</label>
                <input type="date" name="tayang" class="form-control w-50 enter mb-4" value="<?= $tayang ?>" required>

                <label class="mb-3 ">Berakhir Tanggal</label>
                <input type="date" name="berakhir" class="form-control w-50 enter mb-4" value="<?= $berakhir ?>" required>

                <input type="hidden" name="diupdate" id="" value="<?= date("Y-m-d h:i:sa") ?>">
                <input type="hidden" name="id" id="" value="<?= $_GET['id'] ?>">

                <button type="submit" name="ubah" class="btn btn-warning w-50 enter mb-4">Simpan</button>

            </form>


        </div>
        <script>
            function validateForm() {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                var checked = false;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        checked = true;
                    }
                });
                if (!checked) {
                    alert("Anda Belum Memilih Genre Silahkan Pilih Minimal 1");
                    return false;
                }
                return true;
            }
        </script>
</body>

</html>