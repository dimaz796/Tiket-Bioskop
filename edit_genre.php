<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Genre</title>
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
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM `genre` WHERE id_genre=$id");

    while ($genre_data = mysqli_fetch_array($result)) {
        $nama_genre = $genre_data['name_genre'];
        $id_genre = $genre_data['id_genre'];
    }


    ?>
    <div class="container mt-3">

        <form method="post" action="proses_genre.php">
            <h1>Edit Genre</h1>
            <input type="hidden" name="id_genre" value="<?= $id_genre ?>">

            Nama Genre
            <input type="text" name="nama" class="form-control w-50" value="<?= $nama_genre ?>"><br><br>
            <button type="submit" name="ubah" class="btn btn-warning w-50">Ubah</button>
        </form>

    </div>

</body>

</html>