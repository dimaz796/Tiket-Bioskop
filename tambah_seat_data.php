<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Role</title>
</head>

<body>
    <?php
    include "navbar.php";
    $id = $_GET['id'];
    ?>
    <div class="container">
        <form method="post" action="proses_seat.php">
            <h1>Tambah Data Kursi</h1>
            <select name="variable" class="form-select w-50 h-50 enter mb-4 p-1" style="height: 25px; width: 610px;">
                <option value="" class="bg-dark"></option>
                <?php
                $abjad = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'L', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                foreach ($abjad as $index => $value) :
                ?>
                    <option value="<?= $value ?>" class="bg-dark"><?= $value ?></option>
                <?php endforeach ?>
            </select>

            Kolom
            <input type="number" name="kolom" class="w-50 h-50 enter mb-4 p-1 rounded text-body-secondary" placeholder="Kolom Ke Berapa">

            <input type="hidden" name="id" value="$id">
            <button type="submit" name="tambahkan" class="btn btn-warning">Simpan</button>
        </form>

    </div>

</body>

</html>