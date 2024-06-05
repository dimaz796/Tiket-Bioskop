<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data User</title>
    <?php
    include "assets/Link_bootstrap/link_bootstrap.php";
    ?>
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
    include "conn.php";
    ?>

    <?php
    $sql = "SELECT * FROM user JOIN role ON user.id_role=role.id_role ORDER BY id_user ASC";
    $user = mysqli_query($conn, $sql);
    ?>



    <div class="main">
        <div class="container mt-3">
            <div class="card bg-dark ">
                <div class="card-body bg-dark rounded p-4">
                    <h1 class="text-light">Data User</h1>

                    <div class="mb-3 mt-4">
                        <a class="btn btn-warning " href="tambah_user.php"><i class="bi bi-person-add text-dark"></i> Tambah Data User</a>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <table id="example" class='table table-bordered table-striped table-hover'>
                                <thead>
                                    <tr>
                                        <th>ID user</th>
                                        <th>Nama user</th>
                                        <th>Telepon</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($user as $row) { ?>
                                        <tr>
                                            <td><?= $row['id_user']; ?></td>
                                            <td><?= $row['nama_user']; ?></td>
                                            <td><?= $row['telepon']; ?></td>
                                            <td><?= $row['username']; ?></td>
                                            <td><?= $row['name_role']; ?></td>
                                            <td align="center">
                                                <a href="edit_user.php?id=<?= $row['id_user'] ?>">
                                                    <button class="btn btn-dark"><i class="bi bi-pencil-square"></i></button>
                                                </a> |
                                                <a href="proses_user.php?id=<?= $row['id_user'] ?>" onclick="return konfirmasiHapus()">
                                                    <button class="btn btn-warning"><i class="bi bi-trash3"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function konfirmasiHapus() {
            var agree = confirm("Apakah Anda yakin ingin menghapus User Ini?");
            if (agree) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>