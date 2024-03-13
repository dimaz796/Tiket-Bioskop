<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah User</title>
</head>

<body>
    <?php
    include "navbar.php";
    include "conn.php";

    $sql = "SELECT * FROM `role`";
    $role = mysqli_query($conn, $sql);
    $DimasA = mysqli_fetch_all($role);
    ?>
    <div class="container mt-3">
        <form method="post" action="proses_user.php">
            <h1>Tambah User</h1>

            Nama User

            <input type="text" name="nama_user" class="form-control w-50 enter mb-4" placeholder=" Masukan Nama User" required>
            No Telepon

            <input type="number" name="telepon" class="form-control w-50 enter mb-4" placeholder=" Masukan Nomor Telepon Anda" required>
            Username

            <input type="text" name="username" class="form-control w-50 enter mb-4" placeholder=" Masukan Username" required>
            Password

            <input type="text" name="password" class="form-control w-50 enter mb-4" placeholder=" Masukan Password" required>

            Role
            <select name="role" class="form-select w-50 h-50 enter mb-4 p-1" style="height: 25px; width: 610px;" required>
                <option value=""></option>
                <?php foreach ($DimasA as $row) : ?>
                    <option value="<?= $row[0] ?>" class="bg-dark"><?= $row[1] ?></option>
                <?php endforeach ?>
            </select>

            <button type="submit" name="simpan" class="btn btn-warning w-50 enter mb-4">Simpan</button>
        </form>

    </div>

</body>

</html>