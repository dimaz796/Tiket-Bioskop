<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Seat</title>
</head>

<body>
    <?php
    include "navbar.php";
    $sql = "SELECT * FROM `teater`";
    $teater = mysqli_query($conn, $sql);
    $teaters = mysqli_fetch_all($teater);
    ?>
    <div class="container mt-3">
        <form method="post" action="proses_seat.php">
            <h1>Tambah Data Seat</h1>
            Baris
            <select name="baris" class="form-select w-50 h-50 enter mb-4 p-1" style="height: 25px; width: 610px;" required>
                <option value="" class="bg-dark"></option>
                <?php
                $abjad = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                foreach ($abjad as $index => $value) :
                ?>
                    <option value="<?= $value ?>" class="bg-dark"><?= $value ?> - <?= $index + 1 ?> Baris</option>
                <?php endforeach ?>
            </select>

            Kolom
            <input type="number" name="kolom" class="w-50 h-50 enter mb-4 p-1 rounded text-body-secondary" placeholder="Masukan Jumlah Kolom" required>

            Teater
            <select name="teater" class="form-select w-50 h-50 enter mb-4 p-1" style="height: 25px; width: 610px;" required>
                <option value="" class="bg-dark"></option>
                <?php foreach ($teaters as $row) : ?>
                    <option value="<?= $row[0] ?>" class="bg-dark"><?= $row[1] ?></option>
                <?php endforeach ?>
            </select>

            <button type="submit" name="simpan" class="btn btn-warning w-50">Simpan</button>
        </form>

    </div>

</body>

</html>