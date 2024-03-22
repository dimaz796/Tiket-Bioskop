<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Role</title>
    <?php
    include "assets/Link_bootstrap/link_bootstrap.php";
    ?>
    <style>
        table {
            border-collapse: collapse;
            width: 10%;
        }
    </style>
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

    $sql = "SELECT * FROM `role` ORDER BY id_role ASC";
    $role = mysqli_query($conn, $sql);
    ?>
    <div class="container">
        <h1>Data Role</h1>

        <div class="mb-3">
            <a class="btn btn-warning" href="tambah_role.php"><i class="bi bi-person-add"></i>Tambah Data Role</a>
        </div>

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($role as $index => $row) { ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= $row['name_role']; ?></td>
                        <td align="center"><a href="edit_role.php?id=<?= $row['id_role'] ?>"><button class="btn btn-dark"><i class="bi bi-pencil-square"></i></button></a> |
                            <a href="proses_role.php?id=<?= $row['id_role'] ?>" onclick="return konfirmasiHapus()"><button class="btn btn-warning"><i class="bi bi-trash3"></i></button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function konfirmasiHapus() {
            var agree = confirm("Apakah Anda yakin ingin menghapus Role Ini?");
            if (agree) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>