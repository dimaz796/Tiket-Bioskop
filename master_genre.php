<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Genre</title>
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

    $sql = "SELECT * FROM `genre` ORDER BY id_genre ASC";
    $genre = mysqli_query($conn, $sql);
    ?>
    <div class="container">
        <h1>Data Genre</h1>

        <div class="mb-3">
            <a class="btn btn-warning" href="tambah_genre.php"><i class="bi bi-person-add"></i>Tambah Data Genre</a>
        </div>

        <table class='table table-bordered table-striped table-hover' id="example">
            <thead>
                <tr>
                    <th>ID Genre</th>
                    <th>Nama Genre</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($genre as $index => $row) { ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= $row['name_genre']; ?></td>
                        <td align="center"><a href="edit_genre.php?id=<?= $row['id_genre'] ?>"><button class="btn btn-dark"><i class="bi bi-pencil-square"></i></button></a> |
                            <a href="proses_genre.php?id=<?= $row['id_genre'] ?>" onclick="return konfirmasiHapus()"><button class="btn btn-warning"><i class="bi bi-trash3"></i></button></a>
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
            var agree = confirm("Apakah Anda yakin ingin menghapus Genre Ini?");
            if (agree) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>