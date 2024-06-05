<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ganti Password</title>
</head>

<body>
    <?php
    include "navbar.php";
    include "conn.php";
    if ($_SESSION['id_role'] != 4) {
        echo "
             <script>
             window.location.href='login.php?pesan=kemana';
            </script>";
    }
    $id_user = $_SESSION['id_user'];
    $sql = "SELECT * FROM `role`";
    $role = mysqli_query($conn, $sql);
    $DimasA = mysqli_fetch_all($role);
    ?>
    <div class="container mt-3">
        <div class="card bg-dark ">
            <div class="card-body bg-dark rounded p-4">

                <form method="post" action="proses_user.php">
                    <h1>Ganti Password</h1>

                    Password Sebelumnya
                    <input type="text" name="password_sebelumnya" class="form-control w-50 enter mb-4 mt-1" placeholder=" Masukan Password Sebelumnya" required>

                    Password Baru
                    <input type="password" name="password1" class="form-control w-50 enter mb-4" placeholder=" Masukan Password Baru" required>

                    Konfirmasi Password Baru
                    <input type="password" name="password2" class="form-control w-50 enter mb-4" placeholder=" Konfirmasi Password Baru" required>

                    <input type="hidden" name="id_user" value="<?= $id_user ?>">
                    <button type="submit" name="ganti" class="btn btn-warning w-50 enter mb-4">Ganti</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>