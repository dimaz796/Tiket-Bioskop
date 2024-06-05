<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Film</title>
</head>

<body>
    <?php
    include "navbar.php";
    if ($_SESSION['id_role'] != 1) {
        echo "
        <script>
        window.location.href='login.php?pesan=kemana';
       </script>";
    }
    include "conn.php";
    $arr_age = ['SU', '13+', '17+', '21+'];

    $sql = "SELECT * FROM `genre`";
    $genre = mysqli_query($conn, $sql);
    $Genre = mysqli_fetch_all($genre);

    $sql = "SELECT * FROM `dimension`";
    $dimension = mysqli_query($conn, $sql);
    $Dimension = mysqli_fetch_all($dimension);
    ?>
    <div class="container mt-3">
        <div class="card bg-dark ">
            <div class="card-body bg-dark rounded p-4">
                <h1 class="text-light">Tambah Film</h1>
                <form method="post" action="proses_film.php" enctype="multipart/form-data" onsubmit="return validateForm()">


                    <label class="mb-3 ">Nama Film</label>
                    <input type="text" name="nama" class="form-control w-50 enter mb-4" placeholder=" Masukan Nama Film" required>

                    <label class="mb-3 ">Gambar Film</label>
                    <input type="file" name="gambar" class="form-control w-50 enter mb-4" placeholder=" Masukan Gambar Film" required>

                    <label class="mb-3 ">Kategori Umur</label>
                    <select name="age" class="form-select w-50 h-50 enter mb-4 p-1" style="height: 25px; width: 610px;">
                        <?php foreach ($arr_age as $row => $value) : ?>
                            <option value="<?= $value ?>" class="bg-dark"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>

                    <label class="mb-3 ">Genre</label>
                    <div class="btn-group enter mb-4 p-1" role="group" aria-label="Basic checkbox toggle button group">
                        <?php foreach ($Genre as $row) : ?>
                            <input type="checkbox" class="btn-check" id="<?= $row[0] ?>" name="genre[]" value="<?= $row[0] ?>">
                            <label class="btn btn-outline-warning" for="<?= $row[0] ?>"><?= $row[1] ?></label>
                        <?php if ($row[0] == 8) {
                                echo "<br>";
                            }
                        endforeach ?>
                    </div>

                    <label class="mb-3 ">Dimensi</label>
                    <select name="dimension" class="form-select w-50 h-50 enter mb-4 p-1" style="height: 25px; width: 610px;">
                        <?php foreach ($Dimension as $row) : ?>
                            <option value="<?= $row[0] ?>" class="bg-dark"><?= $row[1] ?></option>
                        <?php endforeach ?>
                    </select>

                    <label class="mb-3 ">Durasi</label>
                    <input type="number" name="durasi" class="form-control w-50 enter mb-4" placeholder=" Masukan Durasi Film" required>

                    <label class="mb-3 ">Link Trailer</label>
                    <input type="text" name="trailer" class="form-control w-50 enter mb-4" placeholder=" Masukan Link Film" required>

                    <label class="mb-3 ">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control w-50 enter mb-4" placeholder=" Masukan Deskription Film" required>

                    <label class="mb-3 ">Produser</label>
                    <input type="text" name="produser" class="form-control w-50 enter mb-4" placeholder=" Masukan Produser Film" required>


                    <label class="mb-3 ">Direktur</label>
                    <input type="text" name="directur" class="form-control w-50 enter mb-4" placeholder=" Masukan Produser Film" required>

                    <label class="mb-3 ">Penulis</label>
                    <input type="text" name="writer" class="form-control w-50 enter mb-4" placeholder=" Masukan Distributor Film" required>


                    <label class="mb-3 ">Pemeran</label>
                    <input type="text" name="pemeran" class="form-control w-50 enter mb-4" placeholder=" Masukan Pemeran Film" required>

                    <label class="mb-3 ">Distributor</label>
                    <input type="text" name="distributor" class="form-control w-50 enter mb-4" placeholder=" Masukan Distributor Film" required>

                    <label class="mb-3 ">Tayang Tanggal</label>
                    <input type="date" name="tayang" class="form-control w-50 enter mb-4" placeholder=" Masukan Tayang Tanggal Film" required>

                    <label class="mb-3 ">Berakhir Tanggal</label>
                    <input type="date" name="berakhir" class="form-control w-50 enter mb-4" placeholder=" Masukan Berakhir Tanggal Film" required>

                    <input type="hidden" name="dibuat" id="" value="<?= date("Y-m-d h:i:sa") ?>">
                    <input type="hidden" name="diupdate" id="" value="<?= date("Y-m-d h:i:sa") ?>">

                    <button type="submit" name="simpan" class="btn btn-warning w-50 enter mb-4">Simpan</button>

                </form>
            </div>
        </div>
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