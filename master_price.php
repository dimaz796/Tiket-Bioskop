<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Harga</title>
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

    $sql = "SELECT * FROM `price` ";
    $price = mysqli_query($conn, $sql);
    ?>
    <div class="container mt-3">
        <div class="card bg-dark ">
            <div class="card-body bg-dark rounded p-4">
                <h1 class="text-light">Data Harga</h1>

                <div class="mb-3 mt-4">
                    <a class="btn btn-warning" href="tambah_price.php"><i class="bi bi-person-add text-dark"></i>Tambah Data Harga</a>
                </div>

                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($price as $index => $row) { ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?= $row['day']; ?></td>
                                <td><?= $row['price']; ?></td>
                                <td align="center">
                                    <a href="edit_price.php?day=<?= $row['day'] ?>"><button class="btn btn-dark"><i class="bi bi-pencil-square"></i></button></a> |
                                    <a href="proses_price.php?day=<?= $row['day'] ?>" onclick="return konfirmasiHapus()"><button class="btn btn-warning"><i class="bi bi-trash3"></i></button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
            var agree = confirm("Apakah Anda yakin ingin menghapus Harga Ini?");
            if (agree) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>