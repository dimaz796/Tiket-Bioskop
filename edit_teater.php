<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit teater</title>
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
    $result = mysqli_query($conn, "SELECT * FROM `teater` WHERE id_teater=$id");

    while ($teater_data = mysqli_fetch_array($result)) {
        $nama_teater = $teater_data['name_teater'];
        $id_teater = $teater_data['id_teater'];
        $update_teater = date('Y-m-d h:m:s');
    }


    ?>
    <div class="container mt-3">
        <div class="card bg-dark ">
            <div class="card-body bg-dark rounded p-4">
                <h1 class="text-light">Edit Teater</h1>

                <form method="post" action="proses_teater.php">

                    <input type="hidden" name="id_teater" value="<?= $id_teater ?>">
                    Nama teater
                    <input type="text" name="nama" class="form-control w-50 mb-3" value="<?= $nama_teater ?>">
                    <input type="hidden" name="update" class="form-control w-50" value="<?= $update_teater ?>">
                    <button type="submit" name="ubah" class="btn btn-warning w-50">Ubah</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>