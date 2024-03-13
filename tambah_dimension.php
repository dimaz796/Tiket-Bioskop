<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Dimensi</title>
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <div class="container mt-3">
        <form method="post" action="proses_dimension.php">
            <h1>Tambah Dimensi</h1>

            <label for="" class="fs-5 mt-3 mb-2">Nama Dimensi</label>

            <input type="text" name="nama" class="form-control w-50 enter mb-5" placeholder=" Masukan Nama Dimension" required>
            <button type="submit" name="simpan" class="btn btn-warning w-50">Simpan</button>
        </form>

    </div>

</body>

</html>