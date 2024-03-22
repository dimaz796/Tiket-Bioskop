<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Dimension</title>
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
    $result = mysqli_query($conn, "SELECT * FROM `dimension` WHERE id_dimension=$id");

    while ($dimension_data = mysqli_fetch_array($result)) {
        $nama_dimension = $dimension_data['name_dimension'];
        $id_dimension = $dimension_data['id_dimension'];
    }


    ?>
    time_sleep_unti
    <div class="container mt-3">

        <form method="post" action="proses_dimension.php">
            <h1>Edit Dimension</h1>
            <input type="hidden" name="id_dimension" value="<?= $id_dimension ?>">

            <label for="" class="fs-5 mt-3 mb-2">Nama Dimension</label>

            <input type="text" name="nama" class="form-control w-50" value="<?= $nama_dimension ?>"><br><br>
            <button type="submit" name="ubah" class="btn btn-warning w-50">Ubah</button>
        </form>

    </div>

</body>

</html>