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
    <div class="container mt-3">
        <div class="card bg-dark ">
            <div class="card-body bg-dark rounded p-4">
                <h1 class="text-light">Edit Dimensi</h1>

                <form method="post" action="proses_dimension.php">

                    <input type="hidden" name="id_dimension" value="<?= $id_dimension ?>">

                    <label for="" class="fs-5 mt-3 mb-2">Nama Dimension</label>

                    <input type="text" name="nama" class="form-control w-50" value="<?= $nama_dimension ?>"><br><br>
                    <button type="submit" name="ubah" class="btn btn-warning w-50">Ubah</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>