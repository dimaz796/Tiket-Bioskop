<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Teater</title>
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
        <form method="post" action="proses_teater.php">
            <h1>Tambah Teater</h1>
            Teater
            <input type="text" name="nama" class="form-control w-50 enter mb-4" placeholder=" Masukan Teater" required>
            <button type="submit" name="simpan" class="btn btn-warning">Simpan</button>
        </form>

    </div>

</body>

</html>