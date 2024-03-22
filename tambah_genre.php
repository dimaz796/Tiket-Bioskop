<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Genre</title>
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
    ?>
    <div class="container mt-3">
        <form method="post" action="proses_genre.php">
            <h1>Tambah Genre</h1>

            Nama Genre

            <input type="text" name="nama" class="form-control w-50 enter mb-4" placeholder=" Masukan Nama Genre" required>
            <button type="submit" name="simpan" class="btn btn-warning w-50">Simpan</button>
        </form>

    </div>

</body>

</html>