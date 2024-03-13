<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun</title>
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
            <h1>Daftar Akun</h1>

            Nama
            <input type="text" name="nama_user" class="form-control w-50 enter mb-4" placeholder=" Masukan Nama Anda" required>

            No Telepon
            <input type="number" name="telepon" class="form-control w-50 enter mb-4" placeholder=" Masukan Nomor Telepon Anda" required>

            Username
            <input type="text" name="username" class="form-control w-50 enter mb-4" placeholder=" Masukan Username" required>

            Password
            <input type="password" name="password1" class="form-control w-50 enter mb-4" placeholder=" Masukan Password" required>

            Konfirmasi Password
            <input type="password" name="password2" class="form-control w-50 enter mb-4" placeholder=" Konfirmasi Password" required>

            <img src="capcha.php" alt="gambar" style="border-radius:10px;" /> <br>

            <div class="enter mt-3 mb-3">Konfirmasi Kode : <input name="nilaiCaptcha" type="text" value="" style="border-radius:5px; color:black;"> </div>

            <input type="hidden" value="4" name="role">

            <button type="submit" name="registrasi" class="btn btn-warning w-50 enter mb-4">Registrasi</button>
        </form>
    </div>

</body>

</html>