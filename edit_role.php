<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Role</title>
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
    $result = mysqli_query($conn, "SELECT * FROM `role` WHERE id_role=$id");

    while ($role_data = mysqli_fetch_array($result)) {
        $nama_role = $role_data['name_role'];
        $id_role = $role_data['id_role'];
    }


    ?>
    <div class="container mt-3">
        <div class="card bg-dark ">
            <div class="card-body bg-dark rounded p-4">
                <h1 class="text-light">Edit Role</h1>

                <form method="post" action="proses_role.php">

                    <input type="hidden" name="id_role" value="<?= $id_role ?>">
                    Nama Role
                    <input type="text" name="nama" class="form-control w-50 mb-3" value="<?= $nama_role ?>">
                    <button type="submit" name="ubah" class="btn btn-warning w-50">Ubah</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>